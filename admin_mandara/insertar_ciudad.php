<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "u852886994_mandara"; // Cambia esto por el nombre de usuario de tu base de datos
$password = "Mandara2023"; // Cambia esto por la contraseña de tu base de datos
$dbname = "u852886994_mandara"; // Cambia esto por el nombre de tu base de datos


// Obtener los datos del formulario
$nombreCiudad = $_POST["nombre_ciudad"];
$idPais = $_POST["pais"];

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión y seleccionar la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!mysqli_select_db($conn, $dbname)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conn));
}

// Insertar la ciudad en la base de datos
$sql = "INSERT INTO ciudades (nombre_ciudad, id_pais) VALUES ('$nombreCiudad', '$idPais')";

if ($conn->query($sql) === TRUE) {
    echo "Ciudad insertada correctamente.";
} else {
    echo "Error al insertar la ciudad: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

