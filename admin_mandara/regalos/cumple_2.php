<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Tarjeta de Cumpleaños</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "../assets/menu.php"; ?>

<div class="container mt-4">
    <div class="text-center">
        <h3>Tarjeta de Cumpleaños</h3>
    </div>
    <hr>
    <form action="procesa_cumple_2.php" class="needs-validation" novalidate method="get">
        <div class="form-group">
            <label for="nombreImagen">Seleccione la tarjeta de regalo</label>
            <select class="form-control" id="nombreImagen" name="nombreImagen" required>
                <option value="">Seleccione una opción</option>
                <option value="assets/imgs/1.png">Tarjeta 1</option>
            </select>
            <div class="invalid-feedback">
                Por favor, seleccione una opción.
            </div>
        </div>
        <div class="form-group">
            <label for="texto1">Nombre de cariño</label>
            <input type="text" class="form-control" id="texto1" name="texto1" required placeholder="Ej: Mi amor">
            <div class="invalid-feedback">
                Por favor, ingrese el nombre.
            </div>
        </div>
        <div class="form-group">
            <label for="texto2">Mensaje personalizado (max 200 caracteres)</label>
            <textarea class="form-control" id="texto2" rows="3" name="texto2" required placeholder="Escribe tu mensaje aquí..." maxlength="200"></textarea>
            <div class="invalid-feedback">
                Por favor, ingrese el mensaje.
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Preparar Tarjeta de Regalo</button>
        <a href="regalo.php" class="btn btn-secondary btn-block mt-2">Volver</a>
    </form>
</div>

<?php include "../assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>