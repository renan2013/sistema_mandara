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

// Obtener el ID del país seleccionado desde la solicitud POST
$id_pais = $_POST['id_pais'];

// Consultar las ciudades asociadas al país seleccionado
$sql = "SELECT * FROM ciudades WHERE id_pais = $id_pais";
$result = $conn->query($sql);

// Crear un array asociativo con los resultados de la consulta
$ciudades = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ciudades[] = $row;
    }
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($ciudades);

// Cerrar la conexión
$conn->close();
?>
