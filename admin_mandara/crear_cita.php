<?php

include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El registro ha sido agregado con exito'
  ];

  $config = include 'config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $cliente = [


      "id"   => $_POST['id'],
      "tratamiento"   => $_POST['pais'],
      "detalle" => $_POST['ciudad'],
      "fecha"    => $_POST['fecha'],
      "hora_inicio"     => $_POST['hora_inicio'],
      "hora_final" => $_POST['hora_final'],
      "estado" => $_POST['estado'],
      "importe"     => $_POST['importe'],
      "modo_pago"     => $_POST['modo_pago'],
      "observaciones_c" => $_POST['observaciones_c'],
     
     
    ];

    $consultaSQL = "INSERT INTO citas (id,tratamiento, detalle, fecha, hora_inicio, hora_final, estado, importe,modo_pago, observaciones_c)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($cliente)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($cliente);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
  header("Location:https://semillasdelagro.com/pruebas/admin_mandara/lista_citas.php"); 
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
<? include '../sistema_obsequios/menu.php';?>
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Registrar Cita</h2>
      <hr>
      <form method="post">
      <div class="form-group ">
					<label>Seleccione el Cliente</label>
					<select name="id" class="form-control"> >
						<?php
						require_once 'config.php';
						$odb = new PDO('mysql:host=localhost;dbname=u852886994_mandara', 'u852886994_mandara', 'Mandara2023');
						$query = "SELECT * FROM alumnos ORDER BY apellido ASC ";
						$data = $odb->prepare($query);    // Prepare query for execution
						$data->execute(); // Execute (run) the query

						while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
							echo '<option value="' . $row['id'] . '">' . $row['apellido'] . $row['nombre'] . '</option>';
							//print_r($row); 
						}
						?>
					</select>
				</div>

        <div class="form-group ">
        <label for="pais">Tratamiento:</label>
        <select name="pais" id="pais" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Facial">Facial</option>
            <option value="Corporal">Corporal</option>
           
        </select>
    </div>
    <div class="form-group ">
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

        <div class="form-group ">
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="P">Programada</option>
            <option value="F">Finalizada</option>
            <option value="C">Cancelada</option>
           
        </select>
    </div>
    
        
 

      
      
       

        <div class="form-group">
          <label for="celular">Importe</label>
          <input type="number" name="importe" id="importe" class="form-control">
        </div>

        <div class="form-group ">
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
          <textarea type="text" name="observaciones_c" id="observaciones_c" class="form-control"></textarea>

        </div>

        <div class="form-group">
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-success" value="Enviar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
  <hr/>
  <br/>
  <?php include '../sistema_obsequios/footer.php'; ?>
</div>

