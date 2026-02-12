<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración Mandara</title>
    <!-- Consistent Bootstrap 4 and Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 
    include "assets/menu.php"; 
?>

<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido al Panel de Administración Mandara</h1>
        <p class="lead">Utiliza el menú de navegación para acceder a las diferentes secciones del sistema.</p>
        <hr class="my-4">
        <p>Aquí puedes gestionar clientes, citas, productos y más.</p>
        <a class="btn btn-primary btn-lg" href="lista_clientes.php" role="button">Ir a Lista de Clientes</a>
    </div>
</div>

<?php 
    include "assets/footer.php"; 
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>