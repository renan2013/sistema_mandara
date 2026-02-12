<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Continente</title>
  <!-- Incluir la biblioteca de Bootstrap -->
</head>
<body>
<?php require "templates/header.php"; ?>
  <div class="container">
  <?php include '../sistema_obsequios/menu.php'; ?>
    
    <form id="continenteForm" method="post" action="insertar_continente.php">
      <div class="mb-3">
      <?php include 'menu_edicion.php'; ?>
      <h5>1.-Inserta Categoría</h5>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="continente" id="continente" class="form-control" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Registrar Categoría</button>
    </form>
  </div>
</body>
</html>

