<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'funciones.php';
$config = include 'config.php';

csrf(); // Call csrf function to start session and generate token

if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die("Error CSRF: Solicitud no válida.");
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'La cita ha sido agregada con éxito.'
  ];

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $cita = [
      "id"              => $_POST['id'],
      "tratamiento"     => $_POST['pais'], // Mapped from 'pais' select
      "detalle"         => $_POST['ciudad'], // Mapped from 'ciudad' select
      "fecha"           => $_POST['fecha'],
      "hora_inicio"     => $_POST['hora_inicio'],
      "hora_final"      => $_POST['hora_final'],
      "estado"          => $_POST['estado'],
      "importe"         => $_POST['importe'],
      "modo_pago"       => $_POST['modo_pago'],
      "observaciones_c" => $_POST['observaciones_c'],
    ];

    $consultaSQL = "INSERT INTO citas (id, tratamiento, detalle, fecha, hora_inicio, hora_final, estado, importe, modo_pago, observaciones_c)";
    $consultaSQL .= " VALUES (:id, :tratamiento, :detalle, :fecha, :hora_inicio, :hora_final, :estado, :importe, :modo_pago, :observaciones_c)";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($cita);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
  
  // Redirect to lista_citas.php after processing
  header("Location: lista_citas.php" . ($resultado['error'] ? "?error=" . urlencode($resultado['mensaje']) : ""));
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#pais").on('change', function () {
            var paiselegido = $(this).val();
            if (paiselegido) {
                // Correct path to buscarciudades.php relative to crear_cita.php
                $.post("buscarciudades.php", { paiselegido: paiselegido }, function(data){
                    $("#ciudad").html(data);
                });         
            } else {
                $("#ciudad").html('<option value="">Seleccione un detalle</option>');
            }
        });
    });
    </script>
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4 mb-3">Registrar Cita</h2>
            <p class="text-muted">Última actualización: <?php echo date("Y-m-d H:i:s"); ?></p>
            <hr>
            <?php
            if (isset($resultado) && $resultado['error']) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $resultado['mensaje']; ?>
            </div>
            <?php
            }
            ?>
            <?php
            // Display success message after redirect if present
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
            ?>
            <div class="alert alert-success" role="alert">
                La cita ha sido agregada con éxito!
            </div>
            <?php
            }
            ?>

            <form method="post">
                <div class="form-group">
                    <label for="id">Seleccione el Cliente</label>
                    <select name="id" id="id" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <?php
                        // Correct database connection using PDO from config.php
                        try {
                            $dsn_config = include 'config.php'; // Get config from config.php
                            $db_conexion = new PDO('mysql:host=' . $dsn_config['db']['host'] . ';dbname=' . $dsn_config['db']['name'], $dsn_config['db']['user'], $dsn_config['db']['pass'], $dsn_config['db']['options']);
                            $query = "SELECT id, nombre, apellido FROM alumnos ORDER BY apellido ASC ";
                            $data = $db_conexion->prepare($query);
                            $data->execute();
                            $alumnos = $data->fetchAll(PDO::FETCH_ASSOC);
                            var_dump($alumnos);
                            exit;

                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['apellido']) . ' ' . htmlspecialchars($row['nombre']) . '</option>';
                            }
                        } catch (PDOException $e) {
                            echo '<option value="">Error al cargar clientes: ' . $e->getMessage() . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pais">Tratamiento:</label>
                    <select name="pais" id="pais" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="Facial">Facial</option>
                        <option value="Corporal">Corporal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ciudad">Detalle:</label>
                    <select name="ciudad" id="ciudad" class="form-control"></select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha de atención</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="hora_inicio">Hora Inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="hora_final">Hora Final</label>
                    <input type="time" name="hora_final" id="hora_final" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="P">Programada</option>
                        <option value="F">Finalizada</option>
                        <option value="C">Cancelada</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="importe">Importe</label>
                    <input type="number" name="importe" id="importe" class="form-control">
                </div>

                <div class="form-group">
                    <label for="modo_pago">Forma de Pago:</label>
                    <select name="modo_pago" id="modo_pago" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="Contado">Contado</option>
                        <option value="Sinpe">Sinpe</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
                <hr/>
                
                <div class="form-group">
                    <label for="observaciones_c">Observaciones</label>
                    <textarea name="observaciones_c" id="observaciones_c" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <input name="csrf" type="hidden" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
                    <input type="submit" name="submit" class="btn btn-success" value="Registrar Cita">
                    <a class="btn btn-secondary ml-2" href="lista_citas.php">Volver a Citas</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include "assets/footer.php"; ?>

</body>
</html>