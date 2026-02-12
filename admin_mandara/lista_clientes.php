<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <!-- Consistent Bootstrap 4 and Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #botones{
            display: flex;
            width: 100%;
            padding-bottom: 10px;
            justify-content: space-between;
            align-items: center;
        }
        .div_1{
            flex:2; /* More space for search bar */
        }
        .div_2{
            flex:0 0 auto; /* No grow, no shrink, auto basis */
            margin-left: 10px;
        }
        .div_3{
            flex:0 0 auto; /* No grow, no shrink, auto basis */
        }
    </style>
</head>
<body>

<?php 
    // Include the correct, full-width menu
    // Assuming lista_clientes.php is in admin_mandara/
    include "assets/menu.php"; 
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Lista de Clientes</h3>
    
    <div id="botones">
        <div class="div_1">
            <input type="text" class="form-control" placeholder="Buscar por nombre o apellido..." id="searchInput">
        </div>
        <div class="div_2">
            <button class="btn btn-primary" type="button" id="searchButton"><i class="fa fa-search"></i> Buscar</button>
        </div>
        <div class="div_3">
            <a href="formulario.php" class="btn btn-success">Registrar cliente</a>
        </div>
    </div>    

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                // Database connection (kept as is from original file)
                $servername = "localhost";
                $username = "u852886994_mandara";
                $password = "Mandara2023";
                $database = "u852886994_mandara";

                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT 
                            ROW_NUMBER() OVER(ORDER BY nombre, apellido) AS numero_registro,
                            id,
                            nombre,
                            apellido
                        FROM 
                            alumnos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['numero_registro']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['apellido']."</td>";
                        echo "<td>
                                    <a href='editar.php?id=".$row['id']."' class='mr-2' title='Editar'><i class='fa fa-edit'></i></a>
                                    <a href='borrar.php?id=".$row['id']."' class='mr-2' title='Borrar'><i class='fa fa-trash' style='color:red;'></i></a>
                                    <a href='ver_cliente_2.php?id=".$row['id']."' title='Ver'><i class='fa fa-eye'></i></a>
                             </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    // Client-side search (kept as is from original file)
    $("#searchButton").click(function(){
        var searchText = $("#searchInput").val().toLowerCase();
        $("#tableBody tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
        });
    });
});
</script>

<?php
    // Assuming lista_clientes.php is in admin_mandara/
    include "assets/footer.php";
?>

</body>
</html>