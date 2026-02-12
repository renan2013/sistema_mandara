<?php
require "templates/header.php";
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "u852886994_mandara";
$password = "Mandara2023";
$database = "u852886994_mandara";



$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar todos los continentes
$sql = "SELECT * FROM continentes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combos Dependientes</title>
    <style>
        h5{
            text-align: center;
        }
    </style>
 
</head>
<body>
<div class="container">
<?php include '../sistema_obsequios/menu.php'; ?>
  <?php include 'menu_edicion.php'; ?>
    <h5>Ver Registro de Sistema</h5>

<form action="">
<div class="form-group">
    <label for="continentes">Categoría:</label>
    <select name="continentes" id="continentes" class="form-control">
        <option value="">Selecciona una categoría</option>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id_continente'] . "'>" . $row['nombre_continente'] . "</option>";
            }
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="paises">Servicio:</label>
    <select name="paises" id="paises" class="form-control">
        <option value="">Selecciona un servicio</option>
    </select>
</div>

<div class="form-group">

    <label for="ciudades">Precio:</label>
    <select name="ciudades" id="ciudades" class="form-control">
        <option value="">Precio</option>
    </select>
</form>
</div>

</div>

<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Cuando cambia la selección del continente
    $('#continentes').change(function() {
        var id_continente = $(this).val();

        // Consultar los países asociados al continente seleccionado
        $.ajax({
            url: 'get_paises.php', // Script PHP que devuelve los países
            method: 'POST',
            data: {id_continente : id_continente },
            dataType: 'json',
            success: function(data) {
                // Llenar el combo de países con los resultados de la consulta
                $('#paises').empty().append('<option value="">Selecciona un servicio</option>');
                $.each(data, function(key, value) {
                    $('#paises').append('<option value="' + value.id_pais + '">' + value.nombre_pais + '</option>');
                });
            }
        });
    });

    // Cuando cambia la selección del país
    $('#paises').change(function() {
        var id_pais = $(this).val();

        // Consultar las ciudades asociadas al país seleccionado
        $.ajax({
            url: 'get_ciudades.php', // Script PHP que devuelve las ciudades
            method: 'POST',
            data: {id_pais: id_pais},
            dataType: 'json',
            success: function(data) {
                // Llenar el combo de ciudades con los resultados de la consulta
                $('#ciudades').empty().append('<option value="">Precio</option>');
                $.each(data, function(key, value) {
                    $('#ciudades').append('<option value="' + value.id_ciudad + '">' + value.nombre_ciudad + '</option>');
                });
            }
        });
    });
});
</script>

</body>
</html>
