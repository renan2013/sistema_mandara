
<script language="javascript">
 $(document).ready(function(){
     $("#pais").on('change', function () {
         $("#pais option:selected").each(function () {
             paiselegido=$(this).val();
             $.post("buscarciudades.php", { paiselegido: paiselegido }, function(data){
                 $("#ciudad").html(data);
             });         
         });
    });
 });
 </script>

<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
include '../templates/header.php'; 
include 'menu_edicion.php';
echo "<h5>2.-Lista de Servicios - <a href='formulario_producto.php' class='btn btn-success'>Nuevo Servicio</a></h5>";

echo "</div>";

?>

<?php
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

// Consulta SQL para obtener los productos con su categoría
$sql = "SELECT p.id_producto, p.nombre_producto, p.precio_producto, c.nombre_categoria
        FROM producto p
        INNER JOIN categoria c ON p.id_categoria = c.id_categoria";
$result = $conn->query($sql);

// Verificar si se encontraron productos
if ($result->num_rows > 0) {
    // Mostrar la tabla de productos con su categoría y botón de eliminar
    echo "<div class='container'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre del Producto</th>";
    echo "<th>Precio</th>";
    echo "<th>Categoría</th>";
    echo "<th>Acciones</th>"; // Nueva columna para el botón de eliminar
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nombre_producto"]."</td>";
        echo "<td>".$row["precio_producto"]."</td>";
        echo "<td>".$row["nombre_categoria"]."</td>";
        // Agregar botón de eliminar con SweetAlert
        echo "<td>
                <a href='editar_producto.php?id=".$row["id_producto"]."' class='btn btn-primary'>Editar</a>
                <button onclick='eliminarProducto(".$row["id_producto"].")' class='btn btn-danger'>Eliminar</button>
              </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión
$conn->close();
?>

<!-- Script para mostrar una alerta de confirmación antes de eliminar un producto -->
<script>
function eliminarProducto(idProducto) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Una vez eliminado, no podrás recuperar este producto.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirigir al script eliminar_producto.php con el ID del producto a eliminar
            window.location.href = 'eliminar_producto.php?id=' + idProducto;
        }
    });
}
</script>



