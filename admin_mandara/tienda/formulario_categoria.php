<?php include '../templates/header.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Categoría</title>
  <!-- Incluir la biblioteca de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-L0Wkvg8rFgtq4CqT2TkpHjv5u7UeIL5jPnnhOLd9KLwAK8Iv+oM14iQlLiM7Utnn" crossorigin="anonymous">
  <!-- Incluir SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
  <div class="container">
  <?php 
  include '../../sistema_obsequios/menu.php'; 
  echo "<br/>";
 
  ?>
    <h5>1.-Registrar Categoría</h5>
    <form id="categoriaForm">
      <div class="mb-3">
        <br/>
      <label for="nombreCategoria" class="form-label">Tienda:</label> 
      <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="tienda" id="tienda" value="1">
      <label class="form-check-label" for="inlineRadio1">Si</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="tienda" id="tienda" value="2">
        <label class="form-check-label" for="inlineRadio2">No</label>
      </div>

 
      </div>

      <div class="mb-3">
        <label for="nombreCategoria" class="form-label">Nombre de la Categoría:</label>
        <input type="text" class="form-control" id="nombreCategoria" name="nombre_categoria" required>
      </div>

      <button type="submit" class="btn btn-primary">Agregar Categoría</button>
    </form>
  </div>

  <!-- jQuery para hacer las solicitudes AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#categoriaForm').submit(function(e) {
        e.preventDefault(); // Evitar que el formulario se envíe normalmente
        var formData = $(this).serialize(); // Serializar los datos del formulario
        $.ajax({
          url: 'insertar_categoria.php',
          method: 'POST',
          data: formData,
          dataType: 'json',
          success: function(response) {
            if(response.success) {
              Swal.fire({
                title: '¡Registro Insertado!',
                text: response.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                  $('#categoriaForm')[0].reset(); // Limpiar el formulario
                }
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: response.message,
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
              });
            }
          }
        });
      });
    });
  </script>
  
</body>
</html>
