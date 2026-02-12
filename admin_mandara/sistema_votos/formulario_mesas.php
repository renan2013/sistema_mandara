<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Mesas</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<div class="container">
    <h2 class="mt-5 mb-4">Formulario de Mesas</h2>
    <form action="insertar_votos.php" method="post" id="formulario-mesas">
        <div class="form-group">
            <label for="numero_mesa">Número de Mesa:</label>
            <select id="numero_mesa" name="numero_mesa" class="form-control" require>
                <?php
                // Generar opciones del select de 700 a 772
                for ($i = 700; $i <= 772; $i++) {
                    echo "<option value='$i'>Mesa $i</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="campo1">Campo 1:</label>
            <input type="number" id="campo1" name="campo1" class="form-control" min="0"  >
        </div>
        <div class="form-group">
            <label for="campo2">Campo 2:</label>
            <input type="number" id="campo2" name="campo2" class="form-control" min="0"  >
        </div>
        <div class="form-group">
            <label for="campo3">Campo 3:</label>
            <input type="number" id="campo3" name="campo3" class="form-control" min="0" >
        </div>
        <div class="form-group">
            <label for="campo4">Campo 4:</label>
            <input type="number" id="campo4" name="campo4" class="form-control" min="0" >
        </div>
        <div class="form-group">
            <label for="campo4">Personero:</label>
            <input type="text" id="campo5" name="campo5" class="form-control" required >
        </div>
        <button type="submit" class="btn btn-primary">Registrar Datos</button>
    </form>
</div>



<!-- Script para mostrar mensaje de SweetAlert -->
<script>
// Obtener parámetros de la URL (en este caso, el parámetro 'mensaje')
const urlParams = new URLSearchParams(window.location.search);
const mensaje = urlParams.get('mensaje');
const tipoMensaje = urlParams.get('tipo');

// Función para mostrar mensaje de SweetAlert si hay mensaje en la URL
if (mensaje && tipoMensaje) {
    Swal.fire({
        title: mensaje,
        icon: tipoMensaje,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
}
</script>
</body>
</html>
