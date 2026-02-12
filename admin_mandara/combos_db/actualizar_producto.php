<?php
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener los datos del formulario
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $id_categoria = $_POST['id_categoria'];

    // Consulta SQL para actualizar los datos del producto en la base de datos
    $sql = "UPDATE producto 
            SET nombre_producto = '$nombre_producto', precio_producto = '$precio_producto', id_categoria = '$id_categoria' 
            WHERE id_producto = '$id_producto'";

    if ($conn->query($sql) === TRUE) {
        // Mensaje de confirmación con SweetAlert
        echo "<script>
                window.onload = function() {
                    swal({
                        title: 'Registro Actualizado',
                        text: 'El registro ha sido actualizado correctamente.',
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(function() {
                        // Redirigir a la página de lista de productos después de la actualización
                        window.location = 'lista_productos.php';
                    });
                };
              </script>";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se recibieron los datos del formulario por POST, redirigir a la página de error o a otra página apropiada
    header("Location: pagina_de_error.php");
    exit();
}
?>
