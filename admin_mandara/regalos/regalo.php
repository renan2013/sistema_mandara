<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccione el Regalo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .btn-custom {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <div class="text-center">
        <h3>Portal de Obsequios</h3>
        <p>Seleccione el tipo de tarjeta de regalo que desea generar.</p>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="cumple.php" class="btn btn-success btn-lg btn-block btn-custom"><span class="fa fa-birthday-cake"></span> Lista de Cumpleaños</a>
            <a href="tarjetas_02.php" class="btn btn-primary btn-lg btn-block btn-custom"><span class="fa fa-gift"></span> Regalo Mandara</a>
            <a href="cumple_2.php" class="btn btn-danger btn-lg btn-block btn-custom"><span class="fa fa-gift"></span> Tarjeta de Cumpleaños</a>
        </div>
    </div>
</div>

<?php include "assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>