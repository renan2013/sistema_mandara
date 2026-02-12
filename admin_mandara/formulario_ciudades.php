
<?php require "templates/header.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Ciudades</title>
  <!-- Incluir la biblioteca de Bootstrap -->
</head>
<body>
  <div class="container">
  <?php include '../sistema_obsequios/menu.php'; ?>
  <?php include 'menu_edicion.php'; ?>
    <h5>3.-Registro de precios</h5>
    <form id="ciudadForm" method="post" action="insertar_ciudad.php">
    <div class="form-group">
        <label for="paisSelect" class="form-label">Producto:</label>
        <select class="form-control" id="paisSelect" name="pais" required>
          <option value="">Seleccionar</option>
          <!-- Opciones de países se cargarán aquí dinámicamente -->
        </select>
      </div>
      <div class="form-group">
        <label for="nombreCiudad" class="form-label">Precio:</label>
        <input type="text" class="form-control" id="nombreCiudad" name="nombre_ciudad"  required>
      </div>
      
      <button type="submit" class="btn btn-primary">Registrar Precio</button>
    </form>
  </div>

  <!-- Script para cargar opciones de países desde la base de datos -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtener el elemento de select de países
      var paisSelect = document.getElementById('paisSelect');

      // Fetch para obtener opciones de países desde la base de datos
      fetch('obtener_paises.php')
        .then(response => response.json())
        .then(data => {
          // Iterar sobre los datos y crear opciones para cada país
          data.forEach(pais => {
            var option = document.createElement('option');
            option.value = pais.id_pais; // Usar el ID del país como valor
            option.textContent = pais.nombre_pais;
            paisSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Error al obtener países:', error));
    });
  </script>
</body>
</html>
