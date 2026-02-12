<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'funciones.php'; 
$config = include 'config.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die("Error CSRF: Solicitud no válida.");
}

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id_cita'])) {
  header("Location: lista_citas.php"); // Redirect to list if no ID
  exit();
}

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // Fetch existing data for the form
    $id_cita = $_GET['id_cita'];
    $consultaSQL_fetch = "SELECT c.*, a.nombre AS nombre_alumno, a.apellido AS apellido_alumno 
                          FROM citas c 
                          INNER JOIN alumnos a ON c.id = a.id 
                          WHERE c.id_cita = :id_cita";
    $sentencia_fetch = $conexion->prepare($consultaSQL_fetch);
    $sentencia_fetch->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
    $sentencia_fetch->execute();
    $cita = $sentencia_fetch->fetch(PDO::FETCH_ASSOC);

    if (!$cita) {
        $resultado['error'] = true;
        $resultado['mensaje'] = 'No se ha encontrado el registro de la cita.';
    }

    if (isset($_POST['submit']) && !$resultado['error']) {
        $citas_data = [
            "id_cita"         => $_GET['id_cita'],
            "tratamiento"     => $_POST['tratamiento'],
            "detalle"         => $_POST['detalle'],
            "fecha"           => $_POST['fecha'],
            "hora_inicio"     => $_POST['hora_inicio'],
            "hora_final"      => $_POST['hora_final'],
            "estado"          => $_POST['estado'],
            "importe"         => $_POST['importe'],
            "modo_pago"       => $_POST['modo_pago'],
            "observaciones_c" => $_POST['observaciones_c'],
        ];
        
        $consultaSQL_update = "UPDATE citas SET
            tratamiento = :tratamiento,
            detalle = :detalle,
            fecha = :fecha,
            hora_inicio = :hora_inicio,
            hora_final = :hora_final,
            estado = :estado,
            importe = :importe,
            modo_pago = :modo_pago,
            observaciones_c = :observaciones_c,
            updated_at = NOW()
            WHERE id_cita = :id_cita";
        $sentencia_update = $conexion->prepare($consultaSQL_update);
        $sentencia_update->execute($citas_data);

        $resultado['mensaje'] = 'El registro ha sido actualizado correctamente.';
    }

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        // Function to load detalles based on tratamiento
        function loadDetalles(selectedTratamiento, selectedDetalle = '') {
            if (selectedTratamiento) {
                $.post("buscarciudades.php", { paiselegido: selectedTratamiento }, function(data){
                    $("#detalle").html(data);
                    // Pre-select the existing detalle if provided
                    if (selectedDetalle) {
                        $('#detalle option[value="' + selectedDetalle + '"]').prop('selected', true);
                    }
                });         
            } else {
                $("#detalle").html('<option value="">Seleccione un detalle</option>');
            }
        }

        // Load detalles on page load (for initial pre-selection)
        var initialTratamiento = $('#tratamiento').val();
        var initialDetalle = '<?php echo isset($cita['detalle']) ? htmlspecialchars($cita['detalle'], ENT_QUOTES) : ''; ?>';
        loadDetalles(initialTratamiento, initialDetalle);

        // Load details when tratamiento changes
        $("#tratamiento").on('change', function () {
            loadDetalles($(this).val());
        });
    });
    </script>
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4 mb-3">Editar Cita</h2>
            <hr>
            <?php
            if ($resultado['error']) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $resultado['mensaje']; ?>
            </div>
            <?php
            } elseif (isset($_POST['submit']) && !$resultado['error']) {
            ?>
            <div class="alert alert-success" role="alert">
                <?php echo $resultado['mensaje']; ?>
            </div>
            <?php
            }

            if (isset($cita) && $cita && !$resultado['error']) {
            ?>
            <form method="post">
                <div class="form-group">
                    <label>Cliente:</label>
                    <p class="form-control-static"><?php echo htmlspecialchars($cita['nombre_alumno'] . ' ' . $cita['apellido_alumno']); ?></p>
                </div>

                <div class="form-group">
                    <label for="tratamiento">Tratamiento:</label>
                    <select name="tratamiento" id="tratamiento" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="Facial" <?php if (isset($cita['tratamiento']) && $cita['tratamiento'] == "Facial") echo 'selected'; ?>>Facial</option>
                        <option value="Corporal" <?php if (isset($cita['tratamiento']) && $cita['tratamiento'] == "Corporal") echo 'selected'; ?>>Corporal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle:</label>
                    <select name="detalle" id="detalle" class="form-control"></select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha de atención</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo htmlspecialchars($cita['fecha']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="hora_inicio">Hora Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="<?php echo htmlspecialchars($cita['hora_inicio']); ?>" >
                </div>
                <div class="form-group">
                    <label for="hora_final">Hora Final</label>
                    <input type="time" name="hora_final" id="hora_final" class="form-control" value="<?php echo htmlspecialchars($cita['hora_final']); ?>" >
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="P" <?php if (isset($cita['estado']) && $cita['estado'] == "P") echo 'selected'; ?>>Programada</option>
                        <option value="F" <?php if (isset($cita['estado']) && $cita['estado'] == "F") echo 'selected'; ?>>Finalizada</option>
                        <option value="C" <?php if (isset($cita['estado']) && $cita['estado'] == "C") echo 'selected'; ?>>Cancelada</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="importe">Importe</label>
                    <input type="number" name="importe" id="importe" class="form-control" value="<?php echo htmlspecialchars($cita['importe']); ?>">
                </div>

                <div class="form-group">
                    <label for="modo_pago">Forma de Pago:</label>
                    <select name="modo_pago" id="modo_pago" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="Contado" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Contado") echo 'selected'; ?>>Contado</option>
                        <option value="Sinpe" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Sinpe") echo 'selected'; ?>>Sinpe</option>
                        <option value="Tarjeta" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Tarjeta") echo 'selected'; ?>>Tarjeta</option>
                        <option value="Transferencia" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Transferencia") echo 'selected'; ?>>Transferencia</option>
                        <option value="Pendiente" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Pendiente") echo 'selected'; ?>>Pendiente</option>
                        <option value="Otros" <?php if (isset($cita['modo_pago']) && $cita['modo_pago'] == "Otros") echo 'selected'; ?>>Otros</option>
                    </select>
                </div>
                <hr/>
                
                <div class="form-group">
                    <label for="observaciones_c">Observaciones</label>
                    <textarea name="observaciones_c" id="observaciones_c" class="form-control"><?php echo htmlspecialchars($cita['observaciones_c']); ?></textarea>
                </div>

                <div class="form-group">
                    <input name="csrf" type="hidden" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
                    <input type="submit" name="submit" class="btn btn-success" value="Actualizar">
                    <a class="btn btn-secondary ml-2" href="lista_citas.php">Volver a Citas</a>
                </div>
            </form>
            <?php
            } // End of if isset($cita)
            ?>
        </div>
    </div>
</div>

<?php include "assets/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>