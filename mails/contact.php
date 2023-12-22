<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@clavosclami.com';
        $mail->Password = '9%3[)Nbm\5QO';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; // If doesn't works, put 587
        $mail->CharSet = 'UTF-8';

        $mail->setFrom("contact@clavosclami.com", "Formulario de contacto de la p&aacute;gina web");
        $mail->addAddress('clavosclami@gmail.com');
        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
        $mail->Body = "Nombre: $first_name $last_name\nCorreo electrónico: $email\nTeléfono: $phone\nMensaje: $message";

        $mail->send();
        echo 'Mensaje enviado exitosamente';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>