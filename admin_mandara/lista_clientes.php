<?php
// Cache-busting headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
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
    <h3 class="text-center mb-4">Lista de Clientes</h3>
    
    <div class="row mb-3">
        <div class="col-md-8">
            <form action="lista_clientes.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o apellido..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="formulario.php" class="btn btn-success"><i class="fa fa-plus"></i> Registrar Cliente</a>
        </div>
    </div>    

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "u852886994_mandara";
                $password = "Mandara2023";
                $database = "u852886994_mandara";

                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Pagination variables
                $records_per_page = 25;
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $records_per_page;

                // Search logic
                $search_term = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                $where_clause = '';
                if (!empty($search_term)) {
                    $where_clause = "WHERE nombre LIKE '%$search_term%' OR apellido LIKE '%$search_term%'";
                }

                // Count total records for pagination
                $total_records_sql = "SELECT COUNT(*) AS total FROM alumnos $where_clause";
                $total_result = $conn->query($total_records_sql);
                $total_records = $total_result->fetch_assoc()['total'];
                $total_pages = ceil($total_records / $records_per_page);

                // Fetch records for the current page
                $sql = "SELECT id, nombre, apellido, celular FROM alumnos $where_clause ORDER BY apellido, nombre LIMIT $records_per_page OFFSET $offset";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $record_number = $offset + 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $record_number++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['celular']) . "</td>";
                        echo "<td>
                                    <a href='editar.php?id=".$row['id']."' class='mr-2' title='Editar'><i class='fa fa-edit'></i></a>
                                    <a href='borrar.php?id=".$row['id']."' class='mr-2' title='Borrar'><i class='fa fa-trash' style='color:red;'></i></a>
                                    <a href='ver_cliente_2.php?id=".$row['id']."' title='Ver'><i class='fa fa-eye'></i></a>
                             </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No se encontraron registros</td></tr>";
                }
                $conn->close();
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