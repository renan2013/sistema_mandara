<?php
// Verificar si se enviaron los datos del formulario por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_categoria = $_POST['id_categoria'];
    $nombre_categoria = $_POST['nombre_categoria'];
    $tienda = $_POST['tienda'];

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

    // Consulta SQL para actualizar la categoría en la base de datos
    $sql = "UPDATE categoria SET nombre_categoria='$nombre_categoria', tienda='$tienda' WHERE id_categoria=$id_categoria";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página de lista de categorías
        header("Location: lista_categoria.php");
        exit();
    } else {
        echo "Error al actualizar la categoría: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
