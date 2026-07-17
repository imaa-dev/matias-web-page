<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php'; // Si usas composer
// Si no usas composer, cambia esto por:
 require 'mail/Exception.php';
 require 'mail/PHPMailer.php';
 require 'mail/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración SMTP
    $mail->isSMTP();
   	$mail->Host = 'mail.miarquitectos.cl';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'matias@miarquitectos.cl';
    $mail->Password   = 'matias123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
	$name = $_POST['name'] ?? '';
	$email = $_POST['email'] ?? '';
	$subject = $_POST['subject'] ?? '';
	$message = $_POST['message'] ?? '';
    // Configuración del correo
    $mail->setFrom('matias@miarquitectos.cl', 'Mi arquitectos');
    $mail->addAddress('matignacio.arq@gmail.com', 'Destinatario');
    $mail->addReplyTo($email, 'Responder a');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->AltBody = $message;
    $mail->Body = "
        <h2>Nuevo mensaje desde MI Arquitectos</h2>

        <b>Nombre:</b> {$name}<br>
        <b>Email:</b> {$email}<br>
        <b>Asunto:</b> {$subject}<br><br>

        <b>Mensaje:</b><br>
        {$message}
    ";
    $mail->send();
    echo '¡El correo fue enviado con éxito!';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
