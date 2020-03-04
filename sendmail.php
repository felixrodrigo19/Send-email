<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$nome = $_POST['nome'];
$email = $_POST['mail'];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
    $mail->isSMTP();                                                      // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                      // Enable SMTP authentication
    $mail->Username   = 'rodrigodossantosfelix19111995@gmail.com';            // SMTP username
    $mail->Password   = 'secrett';                           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('rodrigodossantosfelix19111995@gmail.com', 'Rodrigo Felix'); // quem envia
    $mail->addAddress('felixs.rodrigo@gmail.com');     // Add a recipient | Name is optional Quem recebe

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Retorno do Formulario';
    $mail->Body    = 'HTML message body <b>in bold!</b>. nome: '. $nome . ' email: ' . $email;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>