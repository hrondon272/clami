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
        $mail->Host = 'mail.equividasaludocupacional.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto-pagina@equividasaludocupacional.com';
        $mail->Password = '9%Sr.HybH#XL';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $first_name . ' ' . $last_name);
        $mail->addAddress('Servicioalcliente@equividaso.com.co');
        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
        $mail->Body = "Nombre: $first_name $last_name\nCorreo electrónico: $email\nTeléfono: $phone\nMensaje: $message";

        $mail->send();
        echo 'Mensaje enviado exitosamente';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>