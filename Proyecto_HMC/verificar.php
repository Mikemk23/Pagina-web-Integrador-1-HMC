<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $servicio = $_POST["servicio"];
    $mensaje = $_POST["caja-texto"];

    // Configuración para Gmail SMTP
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'tucorreo@gmail.com'; // Reemplaza con tu dirección de Gmail
    $smtpPassword = 'tucontraseña'; // Reemplaza con tu contraseña de Gmail

    $to = "destinatario@gmail.com"; // Reemplaza con la dirección de correo del destinatario
    $subject = "Nuevo mensaje de formulario";
    $message = "Nombre: $nombre\n";
    $message .= "Email: $email\n";
    $message .= "Teléfono: $telefono\n";
    $message .= "Servicio: $servicio\n";
    $message .= "Mensaje:\n$mensaje";

    // Configuración de la conexión SMTP
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUsername;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = $smtpPort;

    // Datos del mensaje
    $mail->setFrom($smtpUsername, 'Nombre remitente');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Envío del mensaje
    if ($mail->send()) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
    }
}
?>

