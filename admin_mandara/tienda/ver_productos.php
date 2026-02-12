<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
include '../templates/header.php';




echo "</div>";

?>

<div class="container mt-5">
    <h5>Tienda Mandara en línea</h5>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <div class="mb-3">
            <label for="categoria" class="form-label">Selecciona una categoría:</label>
            <select class="form-select" id="categoria" name="categoria" onchange="this.form.submit()">
                <option value="">-- Selecciona una categoría --</option>
                <?php
                // Incluir archivo de conexión
                include 'conexion.php';

                // Consultar las categorías
                $query = "SELECT id_categoria, nombre_categoria FROM categoria WHERE tienda=1";
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
    </form>

    <?php
    // Verificar si se ha seleccionado una categoría
    if (isset($_GET['categoria'])) {
        $categoria = $_GET['categoria'];

        // Incluir archivo de conexión
        include 'conexion.php';

        // Consultar los productos de la categoría seleccionada
        $query = "SELECT id_producto, nombre_producto, detalle_producto, precio_producto, imagen_producto FROM producto WHERE id_categoria = $categoria";
        $result = mysqli_query($conexion, $query);

        // Mostrar los productos
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-6 col-md-4">';
            echo '<div class="card">';
            echo '<img src="imagenes/' . $row['imagen_producto'] . '" class="card-img-top" alt="' . $row['nombre_producto'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['nombre_producto'] . '</h5>';
            echo '<p class="card-text">' . $row['detalle_producto'] . '</p>';
            echo '<p class="card-text">' . $row['precio_producto'] . '</p>';
            echo '<a href="#" class="btn btn-primary">Ver Detalles</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';

        // Liberar el resultado
        mysqli_free_result($result);

        // Cerrar la conexión
        mysqli_close($conexion);
    }
    ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
