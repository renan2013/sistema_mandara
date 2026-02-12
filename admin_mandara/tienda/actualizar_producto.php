<?php
// Verificar si se enviaron los datos del formulario
if(isset($_POST['id_producto']) && isset($_POST['nombre_producto']) && isset($_POST['detalle_producto']) && isset($_POST['precio_producto']) && isset($_POST['id_categoria'])) {
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
    $detalle_producto = $_POST['detalle_producto'];
    $precio_producto = $_POST['precio_producto'];
    $id_categoria = $_POST['id_categoria'];

    // Verificar si se envió un nuevo archivo de imagen
    if ($_FILES['imagen_producto']['size'] > 0) {
        // Ruta donde se almacenarán las imágenes
        $carpeta_destino = "imagenes/";

        // Nombre del archivo de imagen
        $nombre_archivo = $_FILES['imagen_producto']['name'];

        // Ruta completa del archivo de imagen
        $ruta_archivo = $nombre_archivo;

        // Mover el archivo de imagen al destino
        if (move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ruta_archivo)) {
            // Consulta SQL para actualizar los datos del producto con la nueva imagen en la base de datos
            $sql = "UPDATE producto SET nombre_producto='$nombre_producto', detalle_producto='$detalle_producto', precio_producto=$precio_producto, imagen_producto='$ruta_archivo', id_categoria=$id_categoria WHERE id_producto=$id_producto";

            if ($conn->query($sql) === TRUE) {
                // Redireccionar a la página de lista de productos
                header("Location: lista_productos.php");
                exit();
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        } else {
            echo "Error al mover el archivo de imagen.";
        }
    } else {
        // Consulta SQL para actualizar los datos del producto sin cambiar la imagen en la base de datos
        $sql = "UPDATE producto SET nombre_producto='$nombre_producto', detalle_producto='$detalle_producto', precio_producto=$precio_producto, id_categoria=$id_categoria WHERE id_producto=$id_producto";

        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página de lista de productos
            header("Location: lista_productos.php");
            exit();
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Datos del formulario incompletos.";
}
?>
