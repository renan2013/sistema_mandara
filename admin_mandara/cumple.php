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


  if (isset($_POST['edad'])) {
    $consultaSQL = "SELECT * FROM alumnos WHERE mes LIKE '%" . $_POST['edad'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM alumnos ORDER BY created_at DESC";
  }

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $clientes = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['edad']) ? 'Cumpleaños (' . $_POST['edad'] . ')' : 'Cumpleaños';
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
     
      
     
      <form method="post" class="form-inline">
      
        <div class="form-group mr-3">
        <select name="edad" id="edad" class="form-control" required>
            <option value="">Seleccione el mes</option>
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Setiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
           
        </select>
          
        </div>
        <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
        <button type="submit" name="submit" class="btn btn-primary">Buscar cumpleaños por mes</button>
      </form>
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
            <th>Nro.</th>
            <th>Nombre</th>
            <th>Mes</th>
            <th>Día</th>
            
         
          </tr>
        </thead>
        <tbody>
          <?php
         
          
        


        
          
          if ($clientes && $sentencia->rowCount() > 0) {
            foreach ($clientes as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["id"]); ?></td>
                <td><?php echo escapar($fila["nombre"])." "; ?><?php echo escapar($fila["apellido"]); ?></td>
                <td><?php $fecha=($fila["edad"]);
                  $fechaEntera = strtotime($fecha);
                  $mes = date("m", $fechaEntera);

                  if ($mes == 1) {
                      echo "Enero";
                } elseif ($mes == 2) {
                      echo "Febrero";
                } 
                elseif ($mes == 2) {
                  echo "Febrero";
                }
                elseif ($mes == 3) {
                      echo "Marzo";
                }
                elseif ($mes == 4) {
                  echo "Abril";
                }
                elseif ($mes == 5) {
                  echo "Mayo";
                }
                elseif ($mes == 6) {
                  echo "Junio";
                }
                elseif ($mes == 7) {
                  echo "Julio";
                }
                elseif ($mes == 8) {
                  echo "Agosto";
                }
                elseif ($mes == 9) {
                  echo "Setiembre";
                }
                elseif ($mes == 10) {
                  echo "Octubre";
                }
                elseif ($mes == 11) {
                  echo "Noviembre";
                }
                elseif ($mes == 12) {
                  echo "Diciembre";
                }
                





              ?>






         </td>
              
                
                <td><?php echo escapar($fila["edad"]); ?></td>
                
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
  <?php
$fecha = "2018-07-30T20:55:20";
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);
 
$hora = date("H", $fechaEntera);
$minutos = date("i", $fechaEntera);
$segundos = date("s", $fechaEntera);
 
#Notar que es lo mismo que hacer
# date("Y-m-d H:i:s")
 

  ?>
  
  <?php include '../sistema_obsequios/footer.php'; ?>
</div>

