<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php
  include "../assets/menu.php";
?>
<div class="wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Clientes</h2>
                        <a href="create.php" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Cliente</a>
                    </div>

                    <?php
                    // Include config file
                    require_once "config.php";

                    // Define search term and prepare the SQL query
                    $search_term = '';
                    $sql = "SELECT * FROM alumnos";

                    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                        $search_term = trim($_GET['search']);
                        $safe_search_term = mysqli_real_escape_string($link, $search_term);
                        $sql .= " WHERE nombre LIKE '%" . $safe_search_term . "%' OR apellido LIKE '%" . $safe_search_term . "%'";
                    }

                    $sql .= " ORDER BY id DESC";
                    ?>

                    <form action="index.php" method="get" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o apellido..." value="<?php echo htmlspecialchars($search_term); ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<div class="table-responsive">';
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>Apellido</th>";
                                            echo "<th>Celular</th>";
                                            echo "<th>Acción</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['apellido'] . "</td>";
                                            echo "<td>" . $row['celular'] . "</td>";
                                            echo "<td>";
                                                echo '<a href="ver_cliente.php?id='. $row['id'] .'" class="mr-3" title="Ver Cliente" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Actualizar Cliente" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" title="Borrar Cliente" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                            echo '</div>';
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-warning"><em>No se encontraron registros que coincidan con su búsqueda.</em></div>';
                        }
                    } else{
                        echo "Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <br/>
    <?php
      include "../assets/footer.php";
    ?>
</body>
</html>