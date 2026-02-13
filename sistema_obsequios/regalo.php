<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccione el regalo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

    <style>
        #selecciona_regalo{
            font-family: 'Roboto', sans-serif;
        }
        #botones{
            padding: 10px;
        }
        .container {
    display: flex;
    flex-direction: column;
}

.btn {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

    </style>
   


</head>
<body>
<div class="container">
<?php include "../admin_mandara/templates/header.php"; ?>
    <?php
          include "menu.php";
      ?>
    
    <br/><br/>


        <div class="container">
        <a href="https://semillasdelagro.com/pruebas/admin_mandara/cumple.php"><button class="btn btn-success"><span class="fas fa-gift"></span> Lista de Cumpleaños</button></a>
        <a href="https://semillasdelagro.com/pruebas/sistema_obsequios/tarjetas_02.php"><button class="btn btn-primary"><span class="fas fa-gift"></span> Regalo Mandara</button></a>
        <a href="https://semillasdelagro.com/pruebas/sistema_obsequios/cumple_2.php"><button class="btn btn-danger"><span class="fas fa-gift"></span> Tarjeta de Cumpleaños</button></a>
    </div>
    <br/><br/>
        <?php
          include "footer.php";
      ?>
    </div>

    <!-- Importar los iconos de Font Awesome (Bootstrap los usa para los iconos) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
