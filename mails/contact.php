<?php
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
        $mail->Username = 'contacto@clavosclami.com';
        $mail->Password = '22a/8WFz,Kq=';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 465; // If doesn't works, put 587

        $mail->setFrom($email, $first_name . ' ' . $last_name);
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