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

// Consulta SQL para obtener todas las categorías
$sql = "SELECT id_categoria, nombre_categoria FROM categoria";
$result = $conn->query($sql);

// Verificar si se encontraron categorías
if ($result->num_rows > 0) {
    // Crear un array para almacenar las categorías
    $categorias = array();

    // Iterar sobre los resultados y agregarlos al array
    while($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }

    // Devolver las categorías como JSON
    header('Content-Type: application/json');
    echo json_encode($categorias);
} else {
    echo "No se encontraron categorías.";
}

// Cerrar la conexión
$conn->close();
?>
