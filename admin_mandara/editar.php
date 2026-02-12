<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'funciones.php';
$config = include 'config.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id'])) {
  header("Location: lista_clientes.php");
  exit();
}

if (isset($_POST['submit'])) {
  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $alumno = [
      "id"        => $_GET['id'],
      "nombre"   => $_POST['nombre'],
      "apellido" => $_POST['apellido'],
      "email"    => $_POST['email'],
      "edad"     => $_POST['edad'],
      "mes"      => date('m', strtotime($_POST['edad'])),
      "celular" => $_POST['celular'],
      "direccion" => $_POST['direccion'],
      "observaciones" => $_POST['observaciones'],
    ];
    
    $consultaSQL = "UPDATE alumnos SET
        nombre = :nombre,
        apellido = :apellido,
        email = :email,
        edad = :edad,
        mes= :mes,
        celular = :celular,
        direccion = :direccion,
        observaciones= :observaciones,
        updated_at = NOW()
        WHERE id = :id";
    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($alumno);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
  $id = $_GET['id'];
  $consultaSQL = "SELECT * FROM alumnos WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);

  if (!$alumno) {
    $resultado['error'] = true;
    $resultado['mensaje'] = 'No se ha encontrado el registro';
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <?php
    if ($resultado['error']) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
            <?= $resultado['mensaje'] ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <?php
    if (isset($_POST['submit']) && !$resultado['error']) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
            El registro ha sido actualizado correctamente.
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <?php
    if (isset($alumno) && $alumno) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-4">Editando el cliente <?= escapar($alumno['nombre']) . ' ' . escapar($alumno['apellido'])  ?></h3>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= escapar($alumno['nombre']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" value="<?= escapar($alumno['apellido']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= escapar($alumno['email']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edad">Fecha Nac.</label>
                    <input type="date" name="edad" id="edad" value="<?= escapar($alumno['edad']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" value="<?= escapar($alumno['celular']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="<?= escapar($alumno['direccion']) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control"><?= escapar($alumno['observaciones']) ?></textarea>
                </div>
                <p class="text-muted">
                    <small>
                        Registro creado el: <?php
                            $fecha_creado = strtotime('-6 hour', strtotime($alumno['created_at']));
                            echo date('Y-m-d H:i:s', $fecha_creado);
                        ?> - Ultima modificación: <?php
                            $fecha_mod = strtotime('-6 hour', strtotime($alumno['updated_at']));
                            echo date('Y-m-d H:i:s', $fecha_mod);
                        ?>
                    </small>
                </p>
                <div class="form-group">
                    <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
                    <input type="submit" name="submit" class="btn btn-success" value="Actualizar">
                    <a class="btn btn-secondary" href="lista_clientes.php">Regresar a la lista</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<?php include "assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>