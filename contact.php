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
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'matias@miarquitectos.cl';
    $mail->Password   = 'matias123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del correo
    $mail->setFrom('mauri.alejandro2165@gmail.com', 'Mauricio');
    $mail->addAddress('mauri.alejandro2165@gmail.com', 'Destinatario'); // 👉 El destinatario
    $mail->addReplyTo('mauri.alejandro2165@gmail.com', 'Responder a');

    $mail->isHTML(true);
    $mail->Subject = 'Asunto';
    $mail->Body    = 'Este es un correo enviado por <b>PHPMailer</b> con SMTP y Gmail.';
    $mail->AltBody = 'Este es un correo enviado por PHPMailer con SMTP y Gmail.';

    $mail->send();
    echo '¡El correo fue enviado con éxito!';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
