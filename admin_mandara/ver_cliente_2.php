<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// include 'funciones.php';
require_once 'dbconfig.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $stmt_edit = $DB_con->prepare('SELECT * FROM alumnos WHERE id = :uid');
  $stmt_edit->execute(array(':uid' => $id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
} else {
  header("Location: lista_clientes.php"); // Redirect to list if no ID
  exit();
}

function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
      $ano_diferencia--;
    return $ano_diferencia;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cliente: <?php echo htmlspecialchars($nombre . ' ' . $apellido); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 
    include "assets/menu.php"; 
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <h3><?php echo htmlspecialchars($nombre . ' ' . $apellido); ?></h3>
            <table class="table table-bordered">
                <tbody>
                    <tr class="bg-success text-white">
                        <td><?php echo htmlspecialchars($email); ?></td>
                        <td><?php echo htmlspecialchars($celular); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha Nac:</strong> <?php echo htmlspecialchars($edad); ?></td>
                        <td><strong>Edad:</strong> <?php echo calculaedad($edad) . " años"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Creado:</strong> <?php 
                           $fecha_creado = strtotime('-6 hour', strtotime($created_at));
                           echo date('Y-m-d H:i:s', $fecha_creado);
                        ?></td>
                        <td><strong>Modificado:</strong> <?php 
                           $fecha_mod = strtotime('-6 hour', strtotime($updated_at));
                           echo date('Y-m-d H:i:s', $fecha_mod);
                        ?></td>
                    </tr>
                    <tr>
                        <td><strong>Direccion:</strong> <?php echo htmlspecialchars($direccion); ?></td>
                        <td><strong>Observaciones:</strong> <?php echo htmlspecialchars($observaciones); ?></td>
                    </tr>
                </tbody>
            </table>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h3>Record de Citas</h3>
            <hr/>
            <?php
            $stmt_citas = $DB_con->prepare("SELECT * FROM citas WHERE id=:uid ORDER BY fecha DESC");
            $stmt_citas->execute(array(':uid' => $id));
            if ($stmt_citas->rowCount() > 0) {
                while ($row_cita = $stmt_citas->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_cita);
            ?>
            <table class="table table-bordered mb-4">
                <tbody>
                    <tr class="bg-primary text-white">
                        <td><strong>Fecha:</strong> <?php echo htmlspecialchars($fecha); ?></td>
                        <td><strong>Hora:</strong> <?php echo htmlspecialchars($hora_inicio . " -- " . $hora_final); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tratamiento:</strong> <?php echo htmlspecialchars($tratamiento); ?></td>
                        <td><strong>Detalle:</strong> <?php echo htmlspecialchars($detalle); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong> <?php echo htmlspecialchars($estado); ?></td>
                        <td><strong>Importe:</strong> <?php echo htmlspecialchars($importe); ?> - <?php echo htmlspecialchars($modo_pago); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Observaciones:</strong> <?php echo htmlspecialchars($observaciones_c); ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
                }
            } else {
                echo "<div class='alert alert-info'>No tiene citas registradas.</div>";
            }
            ?>
        </div>
    </div>
    <a href="lista_clientes.php" class="btn btn-primary mb-4">Volver a la Lista</a>
</div>

<?php 
    include "assets/footer.php"; 
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>