<?php
include 'funciones.php';
require_once 'dbconfig.php';
include 'templates/header.php'; 

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $stmt_edit = $DB_con->prepare('SELECT * FROM alumnos  WHERE id =:uid ');

  $stmt_edit->execute(array(':uid' => $id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
} else {
  header("Location:");
}

?>


<div class="container">
      <?php include '../sistema_obsequios/menu.php'; ?>

      <div class="col-sm-12">
      <h3><?php echo $nombre.$apellido;?></h3>
      <div class="row">
      <table class="table table-bordered">
  
  <tbody>
    <tr class="bg-success text-white">
      <td><?php echo $email;?></td>
      <td><?php echo $celular;?></td>
    </tr>
    <tr>
      <td><p>Fecha Nac:</p><?php echo $edad;?></td>
      <td><p>Edad:</p><?php

      function calculaedad($fechanacimiento){
          list($ano,$mes,$dia) = explode("-",$fechanacimiento);
          $ano_diferencia  = date("Y") - $ano;
          $mes_diferencia = date("m") - $mes;
          $dia_diferencia   = date("d") - $dia;
          if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
          return $ano_diferencia;
          }?>

       <?php echo calculaedad ($edad)." años"; ?>
    </td>
    </tr>
    <tr>
      <td><p>Creado:</p><? $fecha= $created_at;
   $nueva= strtotime('-6 hour', strtotime($fecha));
   $nueva= date('Y-m-d H:i:s', $nueva);
   echo $nueva;
?></td>





      <td><p>Modificado:</p><? $fecha= $updated_at;
   $nueva= strtotime('-6 hour', strtotime($fecha));
   $nueva= date('Y-m-d H:i:s', $nueva);
   echo $nueva;
?></td>
    </tr>
    <tr>
    <td><p>Direccion:</p><?php echo $direccion;?></td>
    <td><p>Observaciones:</p><?php echo $observaciones;?></td>
      
    </tr>
    
   
    
  </tbody>
</table>
<hr/>
      
    </div>
    <h3>Record de Citas</h3>
    <hr/>
  
    
    <?php
             $stmt = $DB_con->prepare("SELECT * FROM citas WHERE id=$id");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
            ?>

<table class="table table-bordered">
  
  <tbody>
    <tr class="bg-primary text-white">
      <td><?php echo "Fecha:   ".$fecha; ?></td>
      <td><?php echo "Hora:   ".$hora_inicio." -- ".$hora_final; ?></td>
    </tr>
    <tr>
      <td><p>Tratamiento:</p><?php echo $tratamiento; ?></td>
      <td><p>Detalle:</p><?php echo $detalle; ?></td>
    </tr>
    <tr>
      <td><p>Estado de la cita:</p><?php echo $estado; ?></td>
      <td><p>Importe:</p><?php echo $importe; ?> - <?php echo $modo_pago; ?>  </td>
    </tr>
    <tr>
    <td colspan="2"><p>Observaciones:</p><?php echo $observaciones;?></td>
      
    </tr>
    
   
    
  </tbody>
</table>
<br/><br/><br/>



               
              <?php
              }
            } else {
              ?>
              <div class="col-xs-12">
                <p>No tiene citas registradas</p>
              </div>
            <?php
            }
            ?>
    
  </div>

 
    
      
      
             
                    
      
    
  
</div>




