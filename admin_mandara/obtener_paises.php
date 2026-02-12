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

// Obtener los países de la base de datos
$sql = "SELECT id_pais, nombre_pais FROM paises";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un array para almacenar los países
    $paises = array();

    // Iterar sobre los resultados y agregarlos al array
    while($row = $result->fetch_assoc()) {
        $paises[] = $row;
    }

    // Devolver los países como JSON
    header('Content-Type: application/json');
    echo json_encode($paises);
} else {
    echo "No se encontraron países en la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>
