<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'funciones.php';
$config = include 'config.php';

$error = false;
$clientes = [];

// Pagination variables
$records_per_page = 25;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $where_clause = '';
    $params = [];
    if (isset($_POST['edad']) && !empty($_POST['edad'])) {
        $where_clause = "WHERE mes = :mes";
        $params[':mes'] = $_POST['edad'];
    }

    // Count total records for pagination
    $total_records_sql = "SELECT COUNT(*) FROM alumnos " . $where_clause;
    $stmt_count = $conexion->prepare($total_records_sql);
    $stmt_count->execute($params);
    $total_records = $stmt_count->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);

    // Fetch records for the current page
    $consultaSQL = "SELECT * FROM alumnos " . $where_clause . " ORDER BY mes, DAY(edad) LIMIT :records_per_page OFFSET :offset";
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $sentencia->bindParam(':offset', $offset, PDO::PARAM_INT);
    foreach ($params as $key => &$val) {
        $sentencia->bindParam($key, $val);
    }
    $sentencia->execute();
    $clientes = $sentencia->fetchAll();

} catch(PDOException $e) {
    $error = $e->getMessage();
}

$titulo = isset($_POST['edad']) && !empty($_POST['edad']) ? 'Cumpleaños del mes ' . $_POST['edad'] : 'Lista de Cumpleaños';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cumpleaños de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "../assets/menu.php"; ?>

<div class="container mt-4">
    <?php
    if ($error) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php
    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3"><?php echo $titulo; ?></h2>
            <form method="post" class="form-inline mb-3">
                <div class="form-group mr-3">
                    <select name="edad" id="edad" class="form-control" required>
                        <option value="">Seleccione el mes</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Buscar por mes</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Mes</th>
                        <th>Día</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($clientes && count($clientes) > 0) {
                        $meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                        foreach ($clientes as $fila) {
                    ?>
                    <tr>
                        <td><?php echo escapar($fila["nombre"]) . " " . escapar($fila["apellido"]); ?></td>
                        <td><?php echo $meses[(int)$fila["mes"]]; ?></td>
                        <td><?php echo date('d', strtotime($fila["edad"])); ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No se encontraron cumpleaños para el mes seleccionado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination Controls -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>&mes=<?= isset($_POST['edad']) ? $_POST['edad'] : '' ?>">Anterior</a></li>
            <?php endif; ?>

            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>&mes=<?= isset($_POST['edad']) ? $_POST['edad'] : '' ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <?php if($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>&mes=<?= isset($_POST['edad']) ? $_POST['edad'] : '' ?>">Siguiente</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<?php include "../assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>