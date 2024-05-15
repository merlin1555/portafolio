<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "tu_correo@ejemplo.com"; // Reemplaza con tu dirección de correo
    $asunto = "Nuevo mensaje de contacto de " . $nombre;

    // Construir el mensaje
    $contenido = "Nombre: " . $nombre . "\n";
    $contenido .= "Correo Electrónico: " . $email . "\n";
    $contenido .= "Mensaje: \n" . $mensaje . "\n";

    // Encabezados adicionales
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "Mensaje enviado exitosamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método no permitido.";
}
?>
