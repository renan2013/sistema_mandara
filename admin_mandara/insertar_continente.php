<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "u852886994_mandara"; // Cambia esto por el nombre de usuario de tu base de datos
$password = "Mandara2023"; // Cambia esto por la contraseña de tu base de datos
$dbname = "u852886994_mandara"; // Cambia esto por el nombre de tu base de datos



// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión y seleccionar la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!mysqli_select_db($conn, $dbname)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conn));
}

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y escapar el valor del continente para prevenir inyecciones SQL
    $continente = mysqli_real_escape_string($conn, $_POST["continente"]);

    // Insertar el continente en la base de datos
    $sql = "INSERT INTO continentes (nombre_continente) VALUES ('$continente')";

    if ($conn->query($sql) === TRUE) {
        echo "Continente insertado correctamente.";
    } else {
        echo "Error al insertar el continente: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
