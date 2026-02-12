<?php include 'header.php';?>
<?php
// Verificar si se proporcionó un ID de producto
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

    // Consulta SQL para obtener los datos del producto seleccionado
    $sql = "SELECT p.nombre_producto, p.precio_producto, p.id_categoria, c.nombre_categoria
            FROM producto p
            INNER JOIN categoria c ON p.id_categoria = c.id_categoria
            WHERE p.id_producto = $id_producto";
    $result = $conn->query($sql);

    // Verificar si se encontró el producto
    if ($result->num_rows > 0) {
        // Obtener los datos del producto
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }

    // Consulta SQL para obtener las categorías desde la base de datos
    $sql_categoria = "SELECT id_categoria, nombre_categoria FROM categoria";
    $result_categoria = $conn->query($sql_categoria);

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Incluir la biblioteca de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-L0Wkvg8rFgtq4CqT2TkpHjv5u7UeIL5jPnnhOLd9KLwAK8Iv+oM14iQlLiM7Utnn" crossorigin="anonymous">
    <!-- Incluir SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container">
    <?php 
  include '../../sistema_obsequios/menu.php'; 
  include 'menu_edicion.php';?>
        <h5>Editar Producto</h5>
        <form id="editarProductoForm" action="actualizar_producto.php" method="POST">
            <div class="mb-3">
                <label for="nombreProducto" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombreProducto" name="nombre_producto" value="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="precioProducto" class="form-label">Precio del Producto:</label>
                <input type="number" class="form-control" id="precioProducto" name="precio_producto" value="<?php echo $producto['precio_producto']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="categoriaProducto" class="form-label">Categoría del Producto:</label>
                <select class="form-control" id="categoriaProducto" name="id_categoria" required>
                    <?php
                    // Generar las opciones del select con las categorías obtenidas de la base de datos
                    if ($result_categoria->num_rows > 0) {
                        while($row_categoria = $result_categoria->fetch_assoc()) {
                            $selected = ($row_categoria['id_categoria'] == $producto['id_categoria']) ? "selected" : "";
                            echo "<option value='".$row_categoria["id_categoria"]."' $selected>".$row_categoria["nombre_categoria"]."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <!-- Script para mostrar SweetAlert después de la actualización -->
    <script>
        document.getElementById("editarProductoForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevenir el envío del formulario por defecto

            // Enviar el formulario utilizando AJAX
            var formData = new FormData(this);

            // Realizar la solicitud AJAX
            fetch(this.action, {
                method: this.method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar SweetAlert con el mensaje de confirmación
                swal({
                    title: 'Registro Actualizado',
                    text: 'El registro ha sido actualizado correctamente.',
                    icon: 'success',
                    button: 'Aceptar'
                }).then(function() {
                    // Redirigir a la página de lista de productos después de la actualización
                    window.location = 'lista_productos.php';
                });
            })
            .catch(error => {
                console.error('Error al actualizar el producto:', error);
            });
        });
    </script>
</body>
</html>
