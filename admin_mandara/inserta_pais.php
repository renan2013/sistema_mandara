<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Países</title>
  <!-- Incluir la biblioteca de Bootstrap -->
</head>
<body>
<?php  require "templates/header.php"; ?>
  <div class="container">
  <?php include '../sistema_obsequios/menu.php'; ?>
  <?php include 'menu_edicion.php'; ?>
    <h5>2.-Inserta Servicios</h5>

    <form id="paisForm" method="post" action="procesa_pais.php">
    <div class="form-group">
        <label for="continenteSelect" >Seleccione la Categoría:</label>
        <select  id="continenteSelect" name="continente" class="form-control" required>
          <option value="">Seleccionar</option>
          <!-- Opciones de continentes se cargarán aquí dinámicamente -->
        </select>
      </div>
      <div class="form-group">
        <label for="nombrePais" >Nombre del Servicio:</label>
        <input type="text" class="form-control" id="nombrePais" name="nombre_pais" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Registrar Servicio</button>
    </form>

  </div>

  <!-- Script para cargar opciones de continentes desde la base de datos -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtener el elemento de select de continentes
      var continenteSelect = document.getElementById('continenteSelect');

      // Fetch para obtener opciones de continentes desde la base de datos
      fetch('obtener_continentes.php')
        .then(response => response.json())
        .then(data => {
          // Iterar sobre los datos y crear opciones para cada continente
          data.forEach(cont => {
            var option = document.createElement('option');
            option.value = cont.id_continente; // Usar el ID del continente como valor
            option.textContent = cont.nombre_continente;
            continenteSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Error al obtener continentes:', error));
    });
  </script>
</body>
</html>
