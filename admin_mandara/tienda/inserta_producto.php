<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
include '../templates/header.php';
echo "<br/>";

echo "<h5>2.Registrar Producto</h5>";
echo "</div>";
?>

<div class="container mt-5">
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
        </div>
        <div class="mb-3">
            <label for="detalle_producto" class="form-label">Detalle del Producto</label>
            <textarea class="form-control" id="detalle_producto" name="detalle_producto" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="precio_producto" class="form-label">Precio del Producto</label>
            <input type="number" class="form-control" id="precio_producto" name="precio_producto" required>
        </div>
        <div class="mb-3">
            <label for="imagen_producto" class="form-label">Imagen del Producto (campo no obligatorio)</label>
            <input type="file" class="form-control" id="imagen_producto" name="imagen_producto" >
        </div>
        <div class="mb-3">
        <select class="form-select" id="categoria_producto" name="id_categoria" required>
                <option value="" disabled selected>-- Selecciona una categoría --</option>
                <?php
                // Incluir archivo de conexión
                include 'conexion.php';

                // Consultar las categorías
                $query = "SELECT id_categoria, nombre_categoria FROM categoria";
                $result = mysqli_query($conexion, $query);

                // Mostrar las categorías en el select
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
                }

                // Liberar el resultado
                mysqli_free_result($result);

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Incluir la conexión a la base de datos
        include 'conexion.php';

        // Recuperar los valores del formulario
        $nombre_producto = $_POST['nombre_producto'];
        $detalle_producto = $_POST['detalle_producto'];
        $precio_producto = $_POST['precio_producto'];
        $id_categoria = $_POST['id_categoria'];

        // Procesar la imagen
        $imagen_producto = $_FILES['imagen_producto']['name'];
        $imagen_temporal = $_FILES['imagen_producto']['tmp_name'];
        $carpeta_destino = "imagenes/";
        move_uploaded_file($imagen_temporal, $carpeta_destino.$imagen_producto);

        // Insertar los datos en la tabla de productos
        $query = "INSERT INTO producto (nombre_producto, detalle_producto, precio_producto, imagen_producto, id_categoria) VALUES ('$nombre_producto', '$detalle_producto', $precio_producto, '$imagen_producto', $id_categoria)";

        if (mysqli_query($conexion, $query)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Producto agregado correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error al agregar el producto: " . mysqli_error($conexion) . "</div>";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
    ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
