<?php include '../templates/header.php'; ?>

<?php 
echo "<div class='container'>";
include '../../sistema_obsequios/menu.php'; 
echo "<br/>";

echo "<h5>Editar Categoría</h5>";

echo "</div>";

?>

<?php
// Verificar si se proporcionó un ID de categoría para editar
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

    // Obtener el ID de la categoría de la URL
    $id_categoria = $_GET['id'];

    // Consulta SQL para obtener los datos de la categoría a editar
    $sql = "SELECT * FROM categoria WHERE id_categoria = $id_categoria";
    $result = $conn->query($sql);

    // Verificar si se encontró la categoría
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre_categoria = $row['nombre_categoria'];
        $tienda = $row['tienda'];
        // Mostrar el formulario de edición de la categoría
        echo "<div class='container'>";
        echo "<form action='actualizar_categoria.php' method='POST'>";
        echo "<input type='hidden' name='id_categoria' value='$id_categoria'>";
        echo "<div class='mb-3'>";
        echo "<label for='nombre_categoria' class='form-label'>Nombre de Categoría</label>";
        echo "<input type='text' class='form-control' id='nombre_categoria' name='nombre_categoria' value='$nombre_categoria'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='tienda' class='form-label'>Tienda</label>";
        echo "<div class='form-check'>";
        echo "<input class='form-check-input' type='radio' name='tienda' id='tienda1' value='1' " . ($tienda == '1' ? 'checked' : '') . ">";
        echo "<label class='form-check-label' for='tienda1'>Si</label>";
        echo "</div>";
        echo "<div class='form-check'>";
        echo "<input class='form-check-input' type='radio' name='tienda' id='tienda2' value='2' " . ($tienda == '2' ? 'checked' : '') . ">";
        echo "<label class='form-check-label' for='tienda2'>No</label>";
        echo "</div>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Actualizar Categoría</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No se encontró la categoría.";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de categoría no proporcionado.";
}
?>

<?php include '../templates/footer.php'; ?>
