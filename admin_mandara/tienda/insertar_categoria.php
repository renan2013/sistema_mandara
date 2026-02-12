<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "u852886994_mandara"; // Cambia esto por el nombre de usuario de tu base de datos
$password = "Mandara2023"; // Cambia esto por la contraseña de tu base de datos
$dbname = "u852886994_mandara"; // Cambia esto por el nombre de tu base de datos


// Obtener el nombre de la categoría enviado desde el formulario
$nombreCategoria = $_POST["nombre_categoria"];
$tienda = $_POST["tienda"];

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión y seleccionar la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si la categoría ya existe
$sql_verificar = "SELECT * FROM categoria WHERE nombre_categoria = '$nombreCategoria'";
$resultado_verificar = $conn->query($sql_verificar);

if ($resultado_verificar->num_rows > 0) {
    // La categoría ya existe, enviar una respuesta JSON con un mensaje de error
    $response = array("success" => false, "message" => "La categoría '$nombreCategoria' ya existe en la base de datos.");
    echo json_encode($response);
} else {
    // La categoría no existe, proceder con la inserción
    $sql_insertar = "INSERT INTO categoria (nombre_categoria,tienda) VALUES ('$nombreCategoria', '$tienda')";
    if ($conn->query($sql_insertar) === TRUE) {
        // Envía una respuesta JSON con un mensaje de éxito
        $response = array("success" => true, "message" => "Categoría agregada correctamente.");
        echo json_encode($response);
    } else {
        // Envía una respuesta JSON con un mensaje de error
        $response = array("success" => false, "message" => "Error al agregar la categoría: " . $conn->error);
        echo json_encode($response);
    }
}

// Cerrar la conexión
$conn->close();
?>