<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: text/html; charset=UTF-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

$token = $_POST['g-recaptcha-response'];
$secretKey = "6LdAAnkpAAAAAN1-41I0z3_mEJteWdR255lcA0J3";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$token");
$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) {

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
            $mail->Password = 'Qb.PC#u#3#cQWAV';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // If doesn't works, put 587
            $mail->CharSet = 'UTF-8';
    
            $mail->setFrom("contacto@clavosclami.com", "Formulario de contacto de la página web");
            $mail->addAddress('clavosclami@gmail.com');
            $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
            $mail->Body = "Nombre: $first_name $last_name\nCorreo electrónico: $email\nTeléfono: $phone\nMensaje: $message";
    
            $mail->send();
            echo 'Mensaje enviado exitosamente';
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }
    }
} else {
    echo "Error: Por favor, verifica que no eres un robot.";
}
?>