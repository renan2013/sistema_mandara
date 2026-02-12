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
    $id_categoria = $_GET['id'];

    // Consulta SQL para obtener los datos del producto seleccionado
    $sql = "SELECT *
            FROM categoria
            WHERE id_categoria = $id_categoria";
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
    <title>Editar Categoría</title>
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
        <h5>Editar Categoría</h5>
        <form id="editarProductoForm" action="actualizar_categoria.php" method="POST">
            <div class="mb-3">
                <label for="nombreCategoria" class="form-label">Nombre de la Categoría:</label>
                <input type="text" class="form-control" id="nombreCategoria" name="nombre_categoria" value="<?php echo htmlspecialchars($producto['nombre_categoria']); ?>" >
            </div>
            
            <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
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
                    window.location = 'lista_categoria.php';
                });
            })
            .catch(error => {
                console.error('Error al actualizar el producto:', error);
            });
        });
    </script>
</body>
</html>
