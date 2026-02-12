<?php


// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "u852886994_mandara";
$password = "Mandara2023";
$database = "u852886994_mandara";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del continente seleccionado desde la solicitud POST
$id_continente = $_POST['id_continente'];

// Consultar los países asociados al continente seleccionado
$sql = "SELECT * FROM paises WHERE id_continente = $id_continente";
$result = $conn->query($sql);

// Crear un array asociativo con los resultados de la consulta
$paises = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $paises[] = $row;
    }
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($paises);

// Cerrar la conexión
$conn->close();
?>