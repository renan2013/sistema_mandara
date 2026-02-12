<?php

include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  $consultaSQL = "SELECT alumnos.nombre, apellido, citas.fecha, id_cita, hora_inicio, hora_final, estado
    from alumnos, citas WHERE alumnos.id=citas.id ORDER BY fecha DESC ";
  

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $clientes = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['apellido']) ? 'Lista de citas (' . $_POST['apellido'] . ')' : 'Lista de citas';
?>

<?php include "templates/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
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
      <a href="https://semillasdelagro.com/pruebas/admin_mandara/crear_cita.php"  class="btn btn-success mt-4">Registrar cita</a>
      
      
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3"><?= $titulo ?></h2>
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Inicio</th>
            <th>Final</th>
            <th>Estado</th>
            <th>Acciones</th>
         
          </tr>
        </thead>
        <tbody>
          <?php
          if ($clientes && $sentencia->rowCount() > 0) {
            foreach ($clientes as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["id_cita"]); ?></td>
                <td><?php echo escapar($fila["nombre"]); ?><?php echo escapar($fila["apellido"]); ?></td>
                <td><?php echo escapar($fila["fecha"]); ?></td>
                <td><?php echo escapar($fila["hora_inicio"]); ?></td>
                <td><?php echo escapar($fila["hora_final"]); ?></td>
                <td><?php echo escapar($fila["estado"]); ?></td>
              
                <td>

                <a href="<?= 'editar_cita.php?id_cita=' . escapar($fila["id_cita"]) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>&nbsp;&nbsp;&nbsp;
                  <a href="<?= 'borrar_cita.php?id_cita=' . escapar($fila["id_cita"]) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" >
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>

                 
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
  <hr/>
  <br/>
  <?php include '../sistema_obsequios/footer.php'; ?>
</div>

