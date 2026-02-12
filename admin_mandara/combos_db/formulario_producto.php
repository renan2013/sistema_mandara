<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Producto</title>
  <!-- Incluir la biblioteca de Bootstrap -->
  <!-- Incluir SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
  <div class="container">
  <?php 
  include '../../sistema_obsequios/menu.php'; 
  include 'menu_edicion.php';?>
  <h5>2.-Registrar Servicio</h5>
    <form id="productoForm">
    <div class="mb-3">
        <label for="categoriaProducto" class="form-label">Categoría del Servicio:</label>
        <select class="form-control" id="categoriaProducto" name="id_categoria" required>
          <option value="">Seleccione una categoría</option>
          <!-- Aquí se llenarán las opciones con las categorías obtenidas de la base de datos -->
        </select>
      </div>
      <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre del Producto:</label>
        <input type="text" class="form-control" id="nombreProducto" name="nombre_producto" required>
      </div>

      <div class="mb-3">
        <label for="precioProducto" class="form-label">Precio:</label>
        <input type="number" class="form-control" id="precioProducto" name="precio_producto" required>
      </div>
    
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
  </div>

  <!-- jQuery para hacer las solicitudes AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      // Cargar las categorías desde la base de datos al cargar la página
      $.ajax({
        url: 'obtener_categorias.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          // Llenar el select con las categorías obtenidas
          response.forEach(function(categoria) {
            $('#categoriaProducto').append('<option value="' + categoria.id_categoria + '">' + categoria.nombre_categoria + '</option>');
          });
        }
      });

      // Manejar el envío del formulario
      $('#productoForm').submit(function(e) {
        e.preventDefault(); // Evitar que el formulario se envíe normalmente
        var formData = $(this).serialize(); // Serializar los datos del formulario
        $.ajax({
          url: 'insertar_producto.php',
          method: 'POST',
          data: formData,
          dataType: 'json',
          success: function(response) {
            if(response.success) {
              // Si la inserción fue exitosa, muestra un mensaje SweetAlert de éxito
              Swal.fire({
                title: '¡Producto Insertado!',
                text: response.message,
                icon: 'success'
              });
              // Limpiar el formulario después de una inserción exitosa
              $('#productoForm')[0].reset();
            } else {
              // Si ocurrió un error, muestra un mensaje SweetAlert de error
              Swal.fire({
                title: 'Error',
                text: response.message,
                icon: 'error'
              });
            }
          }
        });
      });
    });
  </script>
</body>
</html>
