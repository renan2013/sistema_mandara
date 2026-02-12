<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .detalle-imagen {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php
    // Verificar si se ha pasado un ID de producto por parámetro
    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];

        // Incluir archivo de conexión
        include 'conexion.php';

        // Consultar el detalle del producto
        $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
        $result = mysqli_query($conexion, $query);

        // Verificar si se encontró el producto
        if (mysqli_num_rows($result) > 0) {
            $producto = mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="imagenes/<?php echo $producto['imagen_producto']; ?>" class="detalle-imagen" alt="<?php echo $producto['nombre_producto']; ?>">
                </div>
                <div class="col-md-6">
                    <h1><?php echo $producto['nombre_producto']; ?></h1>
                    <p>Precio: <?php echo $producto['precio_producto']; ?></p>
                    <p><?php echo $producto['detalle_producto']; ?></p>
                    <!-- Aquí puedes agregar más información del producto si es necesario -->
                </div>
            </div>
            <?php
        } else {
            echo "<p>No se encontró el producto.</p>";
        }

        // Liberar el resultado
        mysqli_free_result($result);

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "<p>No se ha proporcionado un ID de producto.</p>";
    }
    ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
