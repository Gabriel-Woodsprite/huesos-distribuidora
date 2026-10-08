<?php
//////////////////////////////////
// E N D  P O I N T contact.php //
//////////////////////////////////

// LOADS Y DEPENDENCIAS
require __DIR__ . '/../vendor/autoload.php'; // Si no encuentra, require detiene todo el flujo.

// Alias para dependencias
use Dotenv\Dotenv;
use Resend;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad(); // Carga .env pero si no existe, no falla el código

session_start([
	'cookie_httponly' => true, //Impide el acceso desde javascript a la cookie de sesión (previene xss)
	'cookie_samesite' => 'Lax', // Solo enviará la cookie en navegaciones del mismo sitio (previene csrf)
	'cookie_secure' => !empty($_SERVER['HTTPS']) // Solo envía la cookie por HTTPS (previene sniffing en una red insegura)
]);
$debug = [
	'timestamp' => date('Y-m-d H:i:s'),
	'method'    => $_SERVER['REQUEST_METHOD'] ?? null,
	'post'      => $_POST,
	'server'    => [
		'HTTP_ACCEPT'           => $_SERVER['HTTP_ACCEPT'] ?? null,
		'HTTP_X_REQUESTED_WITH' => $_SERVER['HTTP_X_REQUESTED_WITH'] ?? null,
		'REMOTE_ADDR'           => $_SERVER['REMOTE_ADDR'] ?? null,
		'CONTENT_TYPE'          => $_SERVER['CONTENT_TYPE'] ?? null,
		'HTTP_USER_AGENT'       => $_SERVER['HTTP_USER_AGENT'] ?? null,
	],
	'session'   => $_SESSION,
	'cookies'   => $_COOKIE,
	'files'     => $_FILES,
];

// error_log('DEBUG contact.php: ' . print_r($debug, true));

// -- H E L P E R S ------------------------

// Verificar si el cliente quiere una respuesta JSON (devuelve true) o un redirect (cuando devuelve false)
function wants_json(): bool {
	return str_contains($_SERVER["HTTP_ACCEPT"] ?? '', 'application/json')
		|| ($_SERVER["HTTP_X_REQUESTED_WITH"] ?? '') === "XMLHttpRequest";
}

/*
  Recibe el código de respuesta (500, 200, 400)
	Recibe un array con los datos a responder
	Bool que decide: json -> responder json, false -> redirect
	never: Indica que esta funcion nunca retorna, siempre termina con exit o die y se asegura de nunca retornar
	Nunca retorna valores, simplemente settea valores en la sesión
*/
function respond(int $code, array $payload, bool $json): never {
	http_response_code($code); // Estableciendo código de respuesta

	if ($json) { // Si json = true
		header('Content-Type: application/json; charset=utf-8'); // Envía cabecera que indica que la respuesta será JSON
		// Convierte el array con los datos a responder en un String JSON y no escapa caracteres UNICODE
		echo json_encode($payload, JSON_UNESCAPED_UNICODE);
	} else { // FALLBACK PARA NAVEGADORES SIN JS
		/* Nuestro javascript nos proporciona tres atributos que recibimos desde el payload
		form_errors = [Array de errores del formulario]
		form_old = [Array con datos del formulario guardados en sesión]
		ok = Respuesta que indica si el formulario está correcto
		*/
		$_SESSION["form_errors"] = $payload["errors"] ?? []; // JS envía un objeto errors, si no existe entonces devuelve un array vacío
		$_SESSION["form_old"] = $payload["old"] ?? []; // Objeto old, si no existe entonces devuelve un array vacío
		$_SESSION["form_ok"] = $payload["ok"] ?? false; // Objeto ok, si no existe entonces devuelve un array vacío
		// Javascript ya hace esto por defecto, si algún usuario tuviera js desactivado, el backend cae sobre en esta condición y redirecciona
		header('Location: /index.php#contacto');
	}
	exit;
}

//////////////////////////
// VARIABLES DE ENTORNO //
//////////////////////////
/* MODO INMUTABLE: 
	- Leé por defecto .env en el directorio indicado
	- Evita que se sobreescriban variables de entorno si ya existían previamente en el sistema
*/

//////////////////////////
// VARIABLES DESDE .ENV //
//////////////////////////
// Busca la variable en env y si no exista, asigna null (evita warning)
$apiKey = $_ENV['RESEND_API_KEY'] ?? null;
$emailFrom = $_ENV['EMAIL_FROM'] ?? null;
$templateId = $_ENV['TEMPLATE_ID'] ?? null;
$contactTo = $_ENV['CONTACT_TO'] ?? 'l23650343@zitacuaro.tecnm.mx';

if (!$apiKey || !$emailFrom || !$templateId) {
	/*
	Si CUALQUIERA de mis tres campos obligatorios en .env no existen, la ejecución se detiene
	- Se llena el error log de PHP con detalles técnicos
	- Renderiza la respuesta con respong() para el usuario
	*/
	error_log('[contact] Configuración faltante en .env'); // [contact] prefijo para identificar el origen
	respond(500, ['ok' => false, 'errors' => ['Error de configuración del servidor']], wants_json());
}

//////////////////////////////
// SOLO HAY ENVÍOS POR POST //
//////////////////////////////

// Esto previene accesos desde el navegador (get) y otros tipos de acceso, que devolverían un error
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	respond(405, ['ok' => false, 'errors' => ['Método no permitido.']], wants_json());
}

//////////
// CSRF //
//////////

$token = $_POST['csrf_token'] ?? '';

if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) { // hash_equals previene timing attacks
	respond(419, ['ok' => false, 'errors' => ['Sesión expirada. Recargue la página']], wants_json()); // Si los tokens no
}
// Clave de un solo uso y después de elimina para prevenir que el atacante lo reutilice
unset($_SESSION['csrf_token']);

///////////////////////
// HONEYPOT Y TIMING //
///////////////////////

$honeypot = trim($_POST["website"] ?? '');
$ts = (int) ($_POST["form_ts"] ?? 0);
$elapsed = time() - intdiv($ts, 1000);

if ($honeypot !== '' || $elapsed < 3 || $elapsed > 3600) {
	respond(200, ['ok' => true, 'redirect' => '/gracias.php'], wants_json());
}

///////////////////
// RATE LIMITING //
///////////////////

$ip = $_SERVER["REMOTE_ADDR"] ?? '0.0.0.0'; // Obteniendo ip del cliente, con fallback para evitar warning
$rlDir = __DIR__ . '/storage/rate-limit'; // Obteniendo directorio del RL
@mkdir($rlDir, 0775, true); // Crea directorio y con @ suprime warnings si ya existe
$rlFile = $rlDir . '/' . hash('sha256', $ip) . '.json'; // TODO

$now = time();
$window = 600;
$maxHits = 3;

/*
is_file: Verificará si el archivo existe
file_get_contents lee el contenido
json_decode(,true) devolverá array asociativo
*/
$hits = is_file($rlFile) ? (json_decode(file_get_contents($rlFile), true) ?: []) : [];

/*
array_filter: filtrará los tiempos transcurridos que sean menores a la ventana
array_values: array con los values obtenidos

Esto actualizará los hits (de cada usuario) en tiempo real
*/
$hits = array_values(array_filter($hits, fn($t) => $now - $t < $window));

if (count($hits) >= $maxHits) {
	respond(429, ['ok' => false, 'errors' => ['Demasiadas peticiones. Intenta más tarde']], wants_json());
}

// Añadirá la marca de tiempo actual
$hits[] = $now;

/* 
Escribirá un array como json en el archivo
usamos LOCK_EX para evitar race conditions
*/
file_put_contents($rlFile, json_encode($hits), LOCK_EX);

//////////////////////////////////////////
// VALIDACIÓN y SANITIZADO DESDE $_POST //
//////////////////////////////////////////
$tiposValidos = ["veterinaria", "hospital", "tienda-mascotas", "estetica", "distribuidor", "productor", "otro"]; // WHITELIST

// Lectura y normalización
$nombre = trim((string)$_POST['nombre'] ?? ''); // (string) evita arrays
$tipo_cliente = trim((string)$_POST['tipo_cliente'] ?? '');
$empresa = trim((string)$_POST['empresa'] ?? '');
$emailRaw = trim((string)$_POST['email'] ?? '');
$telefonoRaw = trim((string)$_POST['telefono'] ?? '');
$mensaje = trim((string)$_POST['mensaje'] ?? '');
$privacidad = isset($_POST['privacidad']); // Formato para checkbox

// Busca numeros con formato y normaliza a 0000000000
$telefono = preg_replace('/\D+/', '', $telefonoRaw); // Busca y reemplaza con '' todo lo que no sea digito
$errors = [];

/* === Nombre === */
if ($nombre === '' || mb_strlen($nombre) > 100) { // Mide longitud
	$errors['nombre'] = 'Ingresa un nombre valido (Max. 100 caracteres)';
} elseif (!preg_match('/^[\p{L}\s.\'-]+$/u', $nombre)) { // Si encuentra símbolos fuera de letras, espacios, ., ', -, 
	$errors['nombre'] = 'El nombre contiene caracteres no permitidos.';
}

/* === Empresa === */
if ($empresa !== null) {
	if ($empresa !== '' && mb_strlen($empresa) > 100) {
		$errors['empresa'] = 'El nombre de la empresa es demasiado largo';
	}
}

/* === Tipo de Cliente === */
if (!in_array($tipo_cliente, $tiposValidos, true)) {
	$errors['tipo_cliente'] = 'Selecciona un tipo de establecimiento valido';
}

/* === Email === */
$email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);
if ($email === false || mb_strlen($emailRaw) > 254) {
	$errors['email'] = 'Ingresa un correo electronico válido';
}

/* === Teléfono === */
if (!preg_match('/^\d{10}$/', $telefono)) {
	$errores['telefono'] = 'El teléfono debe tener 10 digitos';
}

/* === Mensaje === */
if ($mensaje === '' || mb_strlen($mensaje) < 10) {
	$errores['mensaje'] = 'Cuentanos un poco mas (Min. 10 caracteres)';
} elseif (mb_strlen($mensaje) > 5000) {
	$errors['mensaje'] = 'El mensaje es demasiado largo (Max. 5000 caracteres)';
}

/* === Privacidad === */
if (!$privacidad) {
	$errors['privacidad'] = 'Acepta la política de privacidad';
}


//////////////////////////
// RESPUESTA DE ERRORES //
//////////////////////////
if ($errors) {
	respond(
		422,
		[
			'ok' => false,
			'errors' => $errors,
			'old' => [
				'nombre' => $mensaje,
				'empresa' => $empresa,
				'tipo_cliente' => $tipo_cliente,
				'email' => $email,
				'telefono' => $telefono,
				'mensaje' => $mensaje
			]
		],
		wants_json()
	);
}

$nombre_subject = preg_replace('/[\r\n]+/', ' ', $nombre);

/////////////////////
// ENVÍO DE CORREO //
/////////////////////

try {
	$resend = Resend::client($apiKey);

	$resend->emails->send([
		'from' => $emailFrom, // Remitente (Verificado)
		'to' => $contactTo, // Destinatario
		'subject' => "Nuevo mensaje de {$nombre_subject}",
		'reply_to' => $email,
		'template' => [
			'id' => $templateId,
			'variables' => [
				'nombre' => $nombre,
				'empresa' => $empresa,
				'tipo_establecimiento' => $tipo_cliente,
				'correo' => $email,
				'telefono' => $telefono,
				'mensaje' => $mensaje
			]
		],
	]);

	respond(200, ['ok' => true, 'redirect' => '/gracias.php'], wants_json());
} catch (\Throwable $e) {
	error_log('[contact] Resend error: ' . $e->getMessage());
	respond(500, [
		'ok' => false,
		'errors' => ['No pudimos enviar tu mensaje. Intenta de nuevo en unos minutos']
	], wants_json());
}
