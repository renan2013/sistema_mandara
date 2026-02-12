<?php

include 'funciones.php'; 


csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id'])) {
  $resultado['error'] = true;
  $resultado['mensaje'] = 'El registro no existe';
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
      "mes"     =>  date('m', strtotime($_POST['edad'])),
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

<?php require "templates/header.php"; ?>

<?php
if ($resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($_POST['submit']) && !$resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          El registro ha sido actualizado correctamente
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($alumno) && $alumno) {
  ?>
  <div class="container">
  <?php include '../sistema_obsequios/menu.php'; ?>
  
    <div class="row">
      <div class="col-md-12">
        <h3 class="mt-4">Editando el cliente <?= escapar($alumno['nombre']) . ' ' . escapar($alumno['apellido'])  ?></h3>
        <nav aria-label="breadcrumb">
  <!-- <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="crear_cita.php">Nueva Cita</a></li>
    <li class="breadcrumb-item" ><a href="#">Registrar Tarjeta de Regalo</a></li>
  </ol> -->
</nav>
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
            <label for="edad">Mes</label>
            <input type="text" name="mes" id="mes" 
            value="<?php
            // Fecha actual
            $fecha = $alumno['edad'];

            // Obtener el valor del mes
            $mes = date('m', strtotime($fecha));

            echo $mes;
            ?>" 
            class="form-control" readonly> 
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
            <textarea type="text" name="observaciones" id="observaciones"  class="form-control"><?= escapar($alumno['observaciones']) ?></textarea>
          </div>


          <p>Registro creado el: <? $fecha= $alumno['created_at'];
   $nueva= strtotime('-6 hour', strtotime($fecha));
   $nueva= date('Y-m-d H:i:s', $nueva);
   echo $nueva;
?> - Ultima modificación:  <? $fecha= $alumno['updated_at'];
$nueva= strtotime('-6 hour', strtotime($fecha));
$nueva= date('Y-m-d H:i:s', $nueva);
echo $nueva;
?> </p>



          <div class="form-group">
            <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
            <input type="submit" name="submit" class="btn btn-success" value="Actualizar">
            <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
          </div>
        </form>

      </div>
    </div>
  </div>
  <?php
}
?>






</div>


<?php require "templates/footer.php"; ?>