<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vitae_lux";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar datos en la tabla
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $metodo_pago = $_POST['metodo-pago'];
    $numero_tarjeta = $_POST['numero-tarjeta'];
    $vencimiento = $_POST['vencimiento'];
    $cvv = $_POST['cvv'];
    $codigo_postal = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $referencias = $_POST['referencias'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO compras (metodo_pago, numero_tarjeta, vencimiento, cvv, codigo_postal, colonia, calle, referencias, cantidad)
            VALUES ('$metodo_pago', '$numero_tarjeta', '$vencimiento', '$cvv', '$codigo_postal', '$colonia', '$calle', '$referencias', '$cantidad')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario a una página de confirmación
        header("Location: confirmacion.html");
        exit();
    } else {
        echo "<p>Error al procesar la compra: " . $conn->error . "</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>
