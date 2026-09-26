<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

use Resend;

//////////////////////////
// VARIABLES DESDE .ENV //
//////////////////////////
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$apiKey = $_SERVER['RESEND_API_KEY'] ?? $_ENV['RESEND_API_KEY'] ?? null;
$emailFrom = $_SERVER['EMAIL_FROM'] ?? $_ENV['EMAIL_FROM'] ?? null;
$templadeId = $_SERVER['TEMPLATE_ID'] ?? $_ENV['TEMPLATE_ID'] ?? null;

if (!$apiKey || !$emailFrom || !$templadeId) {
	error_log('Configuración faltante en .env');
	http_response_code(500);
	die('Error de configuración del servidor');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	die('Método no permitido');
}

//////////////////////////////////////////
// VALIDACIÓN y SANITIZADO DESDE $_POST //
//////////////////////////////////////////
$nombre = trim($_POST['nombre'] ?? '');
$empresa = trim($_POST['empresa'] ?? '');
$tipo_cliente = trim($_POST['tipo_cliente'] ?? '');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT) ?? '';
$mensaje = trim($_POST['mensaje'] ?? '');
$privacidad = isset($_POST['privacidad']);

$errores = [];

if ($nombre === '' || mb_strlen($nombre) > 50) $errores[] = 'Nombre invalido.';
if ($empresa === '' || mb_strlen($empresa) > 100) $errores[] = 'Nombre de empresa muy largo';
if (!$email) $errores[] = 'Email invalido.';
if (!preg_match('/^[0-9]{10}$/', $telefono)) $errores[] = 'Formato de numero invalido';
if ($mensaje === '' || mb_strlen($mensaje) > 5000) $errores[] = 'Mensaje invalido.';
if (!$privacidad) $errores[] = 'Acepta la política de privacidad';

$tiposValidos = [];
if (!in_array($tipo_cliente, $tiposValidos, true)) {
	$errores[] = 'Tipo de cliente inválido.';
}

if ($errores) {
	echo "Existen errores";
	exit;
}

$nombre_subject = preg_replace('/[\r\n]+/', ' ', $nombre);

/////////////////////
// ENVÍO DE CORREO //
/////////////////////
$resend = Resend::client($apiKey);

try {
	$resend->emails->send([
		'from' => $emailFrom,
		'to' => ['l23650343@zitacuaro.tecnm.mx'],
		'subject' => 'Nuevo mensaje de ' . $nombre_subject,
		'reply_to' => $_POST['email'], // LINEA PROVICIONAL. CAMBIOS DESPUÉS DE VERIFICAR DOMINIOS
		'template' => [
			'id' => $templadeId,
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
	header('Location: /gracias.php');
	exit;
} catch (\Throwable $e) {
	error_log('Resend error: ' . $e->getMessage());
	http_response_code(500);
	echo 'Hubo un problema al enviar tu mensaje.';
}
