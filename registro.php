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
if (isset($_POST['insertar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo_electronico = $_POST['correo_electronico'];
    $contraseña = $_POST['contraseña'];
    
    $sql = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contraseña) VALUES ('$nombre', '$apellido', '$correo_electronico', '$contraseña')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de inicio después de insertar los datos
        header("Location: inicio.html");
        exit();
    } else {
        echo "<p>Error al registrar al usuario: " . $conn->error . "</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>
