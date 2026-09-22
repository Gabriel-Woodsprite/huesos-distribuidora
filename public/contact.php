<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

use Resend;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$apiKey = $_SERVER['RESEND_API_KEY'] ?? $_ENV['RESEND_API_KEY'] ?? null;
$emailFrom = $_SERVER['EMAIL_FROM'] ?? $_ENV['EMAIL_FROM'] ?? null;

if (!$apiKey) {
	die('Error: RESEND_API_KEY no está configurado en .env');
}
if (!$emailFrom) {
	die('Error: EMAIL_FROM no está configurado en .env');
}

$resend = Resend::client($apiKey);

$resend->emails->send([
	'from' => $emailFrom,
	'to' => ['l23650343@zitacuaro.tecnm.mx'], // Proximo Cambio: $_POST['correo']
	'subject' => 'Testing No.1',
	'html' => '<p>' . htmlspecialchars($_POST['mensaje']) . '</p>',
]);
header('Location: /gracias.html');
