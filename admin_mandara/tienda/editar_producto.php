<?php include '../templates/header.php'; ?>

<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
echo "<br/>";

echo "<h5>Editar Producto</h5>";

echo "</div>";

?>

<?php
// Verificar si se proporcionó un ID de producto para editar
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

    // Consulta SQL para obtener los datos del producto a editar
    $sql = "SELECT * FROM producto WHERE id_producto = $id_producto";
    $result = $conn->query($sql);

    // Verificar si se encontró el producto
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre_producto = $row['nombre_producto'];
        $detalle_producto = $row['detalle_producto'];
        $precio_producto = $row['precio_producto'];
        $imagen_producto = $row['imagen_producto'];
        $id_categoria = $row['id_categoria'];
        
        // Mostrar el formulario de edición del producto
        echo "<div class='container'>";
        echo "<form action='actualizar_producto.php' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id_producto' value='$id_producto'>";
        echo "<div class='mb-3'>";
        echo "<label for='nombre_producto' class='form-label'>Nombre del Producto</label>";
        echo "<input type='text' class='form-control' id='nombre_producto' name='nombre_producto' value='$nombre_producto'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='detalle_producto' class='form-label'>Detalle del Producto</label>";
        echo "<textarea class='form-control' id='detalle_producto' name='detalle_producto' rows='3'>$detalle_producto</textarea>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='precio_producto' class='form-label'>Precio del Producto</label>";
        echo "<input type='number' class='form-control' id='precio_producto' name='precio_producto' value='$precio_producto'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='imagen_producto' class='form-label'>Imagen del Producto</label><br>";
        echo "<img src='./imagenes/$imagen_producto' alt='Imagen del Producto' style='max-width: 200px;'><br>";
        echo "<input type='file' class='form-control' id='imagen_producto' name='imagen_producto'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='id_categoria' class='form-label'>Categoría del Producto</label>";
        echo "<select class='form-select' id='id_categoria' name='id_categoria'>";
        
        // Consulta SQL para obtener las categorías
        $sql_categorias = "SELECT id_categoria, nombre_categoria FROM categoria";
        $result_categorias = $conn->query($sql_categorias);
        
        // Generar las opciones del select con las categorías
        if ($result_categorias->num_rows > 0) {
            while($row_categoria = $result_categorias->fetch_assoc()) {
                $selected = ($row_categoria['id_categoria'] == $id_categoria) ? "selected" : "";
                echo "<option value='".$row_categoria['id_categoria']."' $selected>".$row_categoria['nombre_categoria']."</option>";
            }
        }
        echo "</select>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Actualizar Producto</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No se encontró el producto.";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de producto no proporcionado.";
}
?>

<?php include '../templates/footer.php'; ?>
