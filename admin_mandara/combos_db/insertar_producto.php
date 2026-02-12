<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
$username = "u852886994_mandara"; // Cambia esto por el nombre de usuario de tu base de datos
$password = "Mandara2023"; // Cambia esto por la contraseña de tu base de datos
$dbname = "u852886994_mandara"; // Cambia esto por el nombre de tu base de datos


// Obtener los datos del producto enviados desde el formulario
$nombreProducto = $_POST["nombre_producto"];
$idCategoria = $_POST["id_categoria"];
$precioProducto = $_POST["precio_producto"];


// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión y seleccionar la base de datos
if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Conexión fallida: " . $conn->connect_error);
    echo json_encode($response);
    exit();
}

// Verificar si ya existe un producto con el mismo nombre en la misma categoría
$sql_verificar = "SELECT * FROM producto WHERE nombre_producto = '$nombreProducto' AND id_categoria = '$idCategoria'";
$resultado_verificar = $conn->query($sql_verificar);

if ($resultado_verificar->num_rows > 0) {
    // El producto ya existe, enviar una respuesta JSON con un mensaje de error
    $response = array("success" => false, "message" => "Ya existe un producto con el mismo nombre en la misma categoría.");
    echo json_encode($response);
} else {
    // El producto no existe, proceder con la inserción
    $sql_insertar = "INSERT INTO producto (nombre_producto, id_categoria, precio_producto) VALUES ('$nombreProducto', '$idCategoria' , '$precioProducto')";
    if ($conn->query($sql_insertar) === TRUE) {
        // Envía una respuesta JSON con un mensaje de éxito
        $response = array("success" => true, "message" => "Producto insertado correctamente.");
        echo json_encode($response);
    } else {
        // Envía una respuesta JSON con un mensaje de error
        $response = array("success" => false, "message" => "Error al insertar el producto: " . $conn->error);
        echo json_encode($response);
    }
}

// Cerrar la conexión
$conn->close();
?>