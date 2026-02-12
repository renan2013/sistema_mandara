<?php
// Verificar si se proporcionó un ID de producto para eliminar
if(isset($_GET['id'])) {
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

    // Obtener el ID del producto de la URL
    $id_producto = $_GET['id'];

    // Consulta SQL para eliminar el producto de la base de datos
    $sql = "DELETE FROM producto WHERE id_producto = $id_producto";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a lista_productos.php
        header("Location: lista_productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de producto no proporcionado.";
}
?>
