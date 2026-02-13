<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de tarjeta de regalo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
  .container{
    padding: 20px;
    
  }
  body{
    background-color:#FFF;
  }
  .titular{
    text-align: center;
  }
</style>

</head>

<body>
    <div class="container">
    <?php
          include "menu.php";
      ?>
    
    <div class="titular">
    <h3>Tarjetas de regalo</h3>
    
    </div>

    <form action="procesar_2.php">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el regalo</label>
    <select class="form-control" id="exampleFormControlSelect1" name="nombreImagen">
      <option value="assets/imgs/tratamiento_facial.png">Limpieza Facial</option>
      <option value="assets/imgs/dermapen.png">Dermapén + Limpieza Facial</option>
      <option value="assets/imgs/tratamiento_reafirmante.png">Reafirmante Facial</option>
      <option value="assets/imgs/ondulado.png">Ondulado de Pestañas</option>
      <option value="assets/imgs/micro_ojos.png">Micropigmentación de Ojos</option>
      <option value="assets/imgs/micropigmentacion labios.png">Micropigmentación de Labios</option>
      <option value="assets/imgs/micropigmentacion cejas.png">Microblanding de Cejas</option>
      <option value="assets/imgs/masaje.png">Masaje Relajante</option>
      <option value="#">Depilación en cera</option>
      <option value="#">Depilación IPL</option>
    </select>
  </div>
  
  <div class="form-group ">
					<label>Seleccione el Cliente</label>
					<select name="benefactor" class="form-control"> >
						<?php
						require_once 'config.php';
						$odb = new PDO('mysql:host=localhost;dbname=u852886994_mandara', 'u852886994_mandara', 'Mandara2023');
						$query = "SELECT * FROM alumnos ORDER BY apellido ASC ";
						$data = $odb->prepare($query);    // Prepare query for execution
						$data->execute(); // Execute (run) the query

						while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
							echo '<option value="' . $row['nombre'] . $row['apellido'] .'">' . $row['apellido'] . $row['nombre'] . '</option>';
							//print_r($row); 
						}
						?>
					</select>
				</div> 
  
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre completo del receptor</label>
    <input type="text" class="form-control" name="texto1" required  >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Emitido</label>
    <input type="date" class="form-control" name="texto2" required   >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valido</label>
    <input type="date" class="form-control" name="texto3" required   >
  </div>
  
  
  <button type="submit" class="btn btn-primary">Procesar tarjeta de regalo</button>
</form>



    </div>
    <?php
          include "footer.php";
      ?>

</body>

</html>