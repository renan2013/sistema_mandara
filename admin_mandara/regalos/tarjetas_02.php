<?php
$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Tarjeta de Regalo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <div class="text-center">
        <h3>Tarjetas de Regalo Mandara</h3>
    </div>
    <hr>
    <form action="procesar_2.php" method="get">
        <div class="form-group">
            <label for="nombreImagen">Seleccione el regalo</label>
            <select class="form-control" id="nombreImagen" name="nombreImagen">
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
        
        <div class="form-group">
            <label for="benefactor">Seleccione el Cliente que regala</label>
            <select name="benefactor" id="benefactor" class="form-control">
                <option value="">Seleccione...</option>
                <?php
                try {
                    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
                    $query = "SELECT * FROM alumnos ORDER BY apellido ASC ";
                    $data = $conexion->prepare($query);
                    $data->execute();

                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . htmlspecialchars($row['nombre'] . ' ' . $row['apellido']) .'">' . htmlspecialchars($row['apellido'] . ' ' . $row['nombre']) . '</option>';
                    }
                } catch(PDOException $e) {
                    echo '<option value="">Error al cargar clientes</option>';
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="texto1">Nombre completo del receptor</label>
            <input type="text" class="form-control" id="texto1" name="texto1" required>
        </div>
        <div class="form-group">
            <label for="texto2">Emitido</label>
            <input type="date" class="form-control" id="texto2" name="texto2" required>
        </div>
        <div class="form-group">
            <label for="texto3">Válido hasta</label>
            <input type="date" class="form-control" id="texto3" name="texto3" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Procesar Tarjeta de Regalo</button>
        <a href="regalo.php" class="btn btn-secondary ml-2">Volver</a>
    </form>
</div>

<?php include "assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>