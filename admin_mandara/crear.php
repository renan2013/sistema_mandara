<?php





include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'Marcelita, el cliente(a) ' . escapar($_POST['nombre']) . ' ha sido agregado con éxito'
  ];

  $config = include 'config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $cliente = [
      "nombre"   => $_POST['nombre'],
      "apellido" => $_POST['apellido'],
      "email"    => $_POST['email'],
      "edad"     => $_POST['edad'],
      "mes"     => date("m",$_POST['edad']),
      "celular" => $_POST['celular'],
      "direccion" => $_POST['direccion'],
      "observaciones"     => $_POST['observaciones'],
    ];

    $consultaSQL = "INSERT INTO alumnos (nombre, apellido, email, edad, mes, celular, direccion, observaciones)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($cliente)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($cliente);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include 'templates/header.php'; ?>

<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
<?php include '../sistema_obsequios/menu.php'; ?>
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Registrar Cliente</h2>
      <hr>
      <div id="like_button_container">
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Fecha Nac.</label>
          <input type="date" name="edad" id="edad" class="form-control">
        </div>

        
        

        <div class="form-group">
          <label for="celular">Celular</label>
          <input type="text" name="celular" id="celular" class="form-control">
        </div>

        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" name="direccion" id="direccion" class="form-control">
        </div>

        <!-- <div class="form-check-inline">
         
                        <label class="form-check-label">
                        Tratamiento&nbsp;&nbsp;&nbsp; <input type="radio" class="form-check-input" name="tratamiento" value="Facial">Facial
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tratamiento" value="Corporal">Corporal
                        </label>
                        </div>
                        <br/><br/> -->

        

        <div class="form-group">
          <label for="observaciones">Observaciones</label>
          <textarea type="text" name="observaciones" id="observaciones" class="form-control"></textarea>

        </div>
        <div class="form-group">
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-success" value="Enviar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
      </div>
    </div>
  </div>
  <hr/>
  <br/>
  <?php include '../sistema_obsequios/footer.php'; ?>
</div>

