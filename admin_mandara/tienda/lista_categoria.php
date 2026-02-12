<?php include '../templates/header.php'; ?>

<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
echo "<br/>";

echo "<h5>1.-Lista de Categorías - <a href='formulario_categoria.php' class='btn btn-success'>Nueva Categoría</a></h5>";
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

// Consulta SQL para obtener las categorías
$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

// Verificar si se encontraron categorías
if ($result->num_rows > 0) {
    // Mostrar la tabla de categorías con botón de eliminar
    echo "<div class='container'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre de Categoría</th>";
    echo "<th>Acciones</th>"; // Nueva columna para los botones de editar y eliminar
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nombre_categoria"]."</td>";
    
        // Agregar botones de editar y eliminar
        echo "<td>
                <a href='editar_categoria.php?id=".$row["id_categoria"]."' class='btn btn-primary'>Editar</a>
                <button class='btn btn-danger' onclick=\"eliminarCategoria(".$row["id_categoria"].")\">Eliminar</button>
              </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    echo "No se encontraron categorías.";
}

// Cerrar la conexión
$conn->close();
?>

<!-- Script para mostrar una alerta de confirmación antes de eliminar una categoría -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function eliminarCategoria(idCategoria) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Una vez eliminada, no podrás recuperar esta categoría.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirigir al script eliminar_categoria.php con el ID de la categoría a eliminar
            window.location.href = 'eliminar_categoria.php?id=' + idCategoria;
        }
    });
}
</script>
