<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento del Formulario</title>
</head>
<body>

<?php
// Verifica si se enviaron datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars($_POST["nombre"]) : "";
    $edad = isset($_POST["edad"]) ? intval($_POST["edad"]) : 0;
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) : "";
    $comentario = isset($_POST["comentario"]) ? htmlspecialchars($_POST["comentario"]) : "";
    $os = isset($_POST["os"]) ? implode(", ", $_POST["os"]) : "";
    $paymentMethod = isset($_POST["paymentmethod"]) ? htmlspecialchars($_POST["paymentmethod"]) : "";
    $deliveryAddress = isset($_POST["deliveryAddress"]) ? htmlspecialchars($_POST["deliveryAddress"]) : "";
    // Puedes agregar más campos según tus necesidades

    // Realiza validaciones
    if (empty($nombre) || strlen($nombre) < 5 || strlen($nombre) > 50) {
        echo "Error: Nombre no válido.";
        exit;
    }

    if ($edad < 0 || $edad > 100) {
        echo "Error: Edad no válida.";
        exit;
    }

    if (empty($email)) {
        echo "Error: Email no válido.";
        exit;
    }

    // Puedes agregar más validaciones según tus necesidades

    // Imprime los resultados
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Comentario: $comentario</p>";
    echo "<p>Sistemas Operativos: $os</p>";
    echo "<p>Método de Pago: $paymentMethod</p>";
    echo "<p>Dirección de Entrega: $deliveryAddress</p>";
    // Agrega más líneas según tus necesidades
} else {
    // Si no se envió nada por POST, muestra un mensaje de error o redirección
    echo "Error: No se han recibido datos del formulario.";
}
?>

</body>
</html>
