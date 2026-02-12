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

if (!isset($_GET['id_cita'])) {
  $resultado['error'] = true;
  $resultado['mensaje'] = 'El registro no existe';
}

if (isset($_POST['submit'])) {
  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $citas = [
      "id_cita"        => $_GET['id_cita'],
      "tratamiento"   => $_POST['tratamiento'],
      "detalle" => $_POST['detalle'],
      "fecha"    => $_POST['fecha'],
      "hora_inicio"     => $_POST['hora_inicio'],
      "hora_final" => $_POST['hora_final'],
      "estado" => $_POST['estado'],
      "importe" => $_POST['importe'],
      "modo_pago"    => $_POST['modo_pago'],
      "observaciones_c" => $_POST['observaciones_c'],
    ];
    
    $consultaSQL = "UPDATE citas SET
        tratamiento = :tratamiento,
        detalle= :detalle,
        fecha = :fecha,
        hora_inicio = :hora_inicio,
        hora_final = :hora_final,
        estado = :estado,
        importe = :importe,
        modo_pago = :modo_pago,
        observaciones_c= :observaciones_c,
        updated_at = NOW()
        WHERE id_cita = :id_cita";
    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($citas);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
  $id = $_GET['id_cita'];
  $consultaSQL =  "SELECT alumnos.nombre, apellido, citas.id_cita,tratamiento,detalle,fecha,hora_inicio,hora_final,estado,importe,modo_pago,observaciones_c
  from alumnos, citas WHERE alumnos.id=citas.id AND id_cita =" . $id; 

 






  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $citas = $sentencia->fetch(PDO::FETCH_ASSOC);

  if (!$citas) {
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
if (isset($citas) && $citas) {
  ?>
  <div class="container">
  <?php include '../sistema_obsequios/menu.php'; ?>
  
    <div class="row">
      <div class="col-md-12">
        <h4 class="mt-4">Editando Cita: <?php echo $citas['nombre'];?> <?php echo $citas['apellido'];?> </h4>
        <nav aria-label="breadcrumb">
  <!-- <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="crear_cita.php">Nueva Cita</a></li>
    <li class="breadcrumb-item" ><a href="#">Registrar Tarjeta de Regalo</a></li>
  </ol> -->
</nav>
        <hr>
        <form method="post">
          



        <div class="form-group ">
        <label for="pais">Tratamiento:</label>
        <select name="tratamiento" id="pais" class="form-control" >
            <option value="Facial" <?php if ($citas['tratamiento'] == "Facial") echo 'selected'; ?>>Facial</option>
            <option value="Corporal" <?php if ($citas['tratamiento'] == "Corporal") echo 'selected'; ?>>Corporal</option>
           
        </select>
    </div>
    <div class="form-group ">
        <label for="ciudad">Detalle:</label>
        <select name="detalle" id="ciudad" class="form-control">
                    <option value="<?= escapar($citas['detalle']) ?>"><?php echo $citas['detalle'];?></option>
        </select>
    </div>
          <div class="form-group">
            <label for="fecha_atencion">Fecha Atención</label>
            <input type="date" name="fecha" id="fecha" value="<?= escapar($citas['fecha']) ?>" class="form-control">
          </div>

          <div class="form-group">
          <label for="hora_inicio">Hora Inicio</label>
          <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="<?= escapar($citas['hora_inicio']) ?>" >
        </div>
        <div class="form-group">
          <label for="hora_final">Hora Final</label>
          <input type="time" name="hora_final" id="hora_final" class="form-control" value="<?= escapar($citas['hora_final']) ?>" >
        </div>

         

          <div class="form-group ">
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control" >

            <option value="" <?php if ($citas['estado'] == "") echo 'selected'; ?>>Seleccione...</option>
            <option value="P" <?php if ($citas['estado'] == "P") echo 'selected'; ?>>Programada</option>
            <option value="F" <?php if ($citas['estado'] == "F") echo 'selected'; ?>>Finalizada</option>
            <option value="C" <?php if ($citas['estado'] == "C") echo 'selected'; ?>>Cancelada</option>

           
        </select>

        <div class="form-group">
          <label for="celular">Importe</label>
          <input type="number" name="importe" id="importe" class="form-control" value="<?= escapar($citas['importe']) ?>">
        </div>

        <div class="form-group ">
        <label for="modo_pago">Forma de Pago:</label>
        <select name="modo_pago" id="modo_pago" class="form-control" >

            <option value="" <?php if ($citas['modo_pago'] == "") echo 'selected'; ?>>Seleccione...</option>
            <option value="Contado" <?php if ($citas['modo_pago'] == "Contado") echo 'selected'; ?>>"Contado</option>
            <option value="Sinpe" <?php if ($citas['modo_pago'] == "Sinpe") echo 'selected'; ?>>Sinpe</option>
            <option value="Tarjeta" <?php if ($citas['modo_pago'] == "Tarjeta") echo 'selected'; ?>>Tarjeta</option>
            <option value="Transferencia" <?php if ($citas['modo_pago'] == "Transferencia") echo 'selected'; ?>>Transferencia</option>
            <option value="Pendiente" <?php if ($citas['modo_pago'] == "Pendiente") echo 'selected'; ?>>Pendiente</option>
            <option value="Otros" <?php if ($citas['modo_pago'] == "Otros") echo 'selected'; ?>>Otros</option>
  
           
        </select>

         


          <div class="form-group">
            <label for="observaciones_c">Observaciones</label>
            <textarea type="text" name="observaciones_c" id="observaciones_c"  class="form-control"><?= escapar($citas['observaciones_c']) ?></textarea>
          </div>


          <p>Cita creada el: <? $fecha= $citas['created_at'];
   $nueva= strtotime('-6 hour', strtotime($fecha));
   $nueva= date('Y-m-d H:i:s', $nueva);
   echo $nueva;
?> - Ultima modificación:  <? $fecha= $citas['updated_at'];
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