<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$config = include 'config.php';

// Pagination variables
$records_per_page = 25;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Search logic (optional for citas, but included for consistency if needed later)
$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';
$where_clause = '';
if (!empty($search_term)) {
    // Sanitize the search term for PDO
    $search_param = '%' . $search_term . '%';
    $where_clause = "WHERE (a.nombre LIKE :search_term OR a.apellido LIKE :search_term OR c.tratamiento LIKE :search_term)";
}

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // Count total records for pagination
    $total_records_sql = "SELECT COUNT(*) FROM citas c INNER JOIN alumnos a ON c.id = a.id $where_clause";
    $stmt_count = $conexion->prepare($total_records_sql);
    if (!empty($search_term)) {
        $stmt_count->bindParam(':search_term', $search_param);
    }
    $stmt_count->execute();
    $total_records = $stmt_count->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);

    // Fetch records for the current page
    $sql = "SELECT c.*, a.nombre AS nombre_alumno, a.apellido AS apellido_alumno
            FROM citas c
            INNER JOIN alumnos a ON c.id = a.id
            $where_clause
            ORDER BY c.fecha DESC, c.hora_inicio DESC
            LIMIT :records_per_page OFFSET :offset";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    if (!empty($search_term)) {
        $stmt->bindParam(':search_term', $search_param);
    }
    $stmt->execute();
    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .page-link {
            color: #007bff;
        }
    </style>
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Lista de Citas</h3>
    
    <div class="row mb-3">
        <div class="col-md-8">
            <form action="lista_citas.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por cliente o tratamiento..." value="<?php echo htmlspecialchars($search_term); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="crear_cita.php" class="btn btn-success"><i class="fa fa-plus"></i> Registrar Cita</a>
        </div>
    </div>    

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tratamiento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Hora Fin</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($citas) > 0) {
                    $contador = $offset + 1;
                    foreach ($citas as $fila) {
                        echo "<tr>";
                        echo "<td>" . $contador++ . "</td>";
                        echo "<td>" . htmlspecialchars($fila["nombre_alumno"]) . " " . htmlspecialchars($fila["apellido_alumno"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["tratamiento"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["fecha"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["hora_inicio"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["hora_final"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["estado"]) . "</td>";
                        echo "<td>
                                <a href='editar_cita.php?id_cita=".$fila['id_cita']."' class='mr-2' title='Editar'><i class='fa fa-edit'></i></a>
                                <a href='borrar_cita.php?id_cita=".$fila['id_cita']."' class='mr-2' title='Borrar'><i class='fa fa-trash' style='color:red;'></i></a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No se encontraron citas</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($search_term) ?>">Anterior</a></li>
            <?php endif; ?>

            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search_term) ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <?php if($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($search_term) ?>">Siguiente</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include "assets/footer.php"; ?>

</body>
</html>