<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre2"]) || !isset($_POST["telefono2"])  || !isset($_POST["email2"])  || !isset($_POST["date"])  || !isset($_POST["domicilio"])  || !isset($_POST["tipo"])  || !isset($_POST["cantidad"])  || !isset($_POST["duracion"])  || !isset($_POST["necesita"]) || !isset($_POST["mensaje2"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre2"];
$telefono = $_POST["telefono2"];
$email = $_POST["email2"];
$date = $_POST["date"];
$domicilio = $_POST["domicilio"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$duracion = $_POST["duracion"];
$necesita = $_POST["necesita"];
$mensaje = $_POST["mensaje2"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2090396.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "hola@bokend.com";  // Mi cuenta de correo
$smtpClave = "E*LEW@40vD";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "contacto@canicobaeventos.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "DonWeb - Ejemplo de formulario de contacto"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Formulario de ejemplo. By DonWeb<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
