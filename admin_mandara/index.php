<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registros de Clientes</title>
<!-- Agregar enlaces a Bootstrap CSS -->

<style>
    #botones{
        display: flex;
        width: 100%;
        padding-bottom: 10px;
    }
    .div_1{
        
        flex:3;
    }
    .div_2{
        
        flex:1;
    }
    .div_3{
        text-align: right;
        flex:1;
       
    }

  

    @media (max-width: 768px) {
        .table-container {
            width: 100%;
        }
    }
</style>
</head>
<body>
<div class="container">
<?php include "templates/header.php"; ?>
<?php include '../sistema_obsequios/menu.php'; ?>


<h3 class="text-center mt-3">Lista de Clientes</h3>
    <div  id="botones">
        <div class="div_1">
            <input type="text" class="form-control" placeholder="Buscar por nombre" id="searchInput">
        </div>
        <div class="div_2">
            <button class="btn btn-primary" type="button" id="searchButton"><i class="fas fa-search" ></i></button>
        </div>
        <div class="div_3">
            
            <a href="formulario.php"><button class="btn btn-success" type="button" id="searchButton" title="Registrar nuevo cliente"><i class="fas fa-plus" ></i></button></a>
        </div>
    </div>    


<div class="table-container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Nro.</th>
                <th scope="col">Nombre</th>
                
                <th scope="col">Acciones</th>
              
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
    
            // Conexión a la base de datos
        $servername = "localhost";
        $username = "u852886994_mandara";
        $password = "Mandara2023";
        $database = "u852886994_mandara";


            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los registros numerados de la tabla alumnos
            $sql = "SELECT 
                        ROW_NUMBER() OVER(ORDER BY nombre, apellido) AS numero_registro,
                        id,
                        nombre,
                        apellido
                    FROM 
                        alumnos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los datos en la tabla
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['numero_registro']."</td>";
                    echo "<td>".$row['nombre'].' '.$row['apellido']."</td>";
                    ;
                    echo "<td>
                                <a href='editar.php?id=".$row['id']."'><i class='fa fa-edit' style='font-size:18px;color:black' title='Editar'></i> </a>
                                <a href='borrar.php?id=".$row['id']."'><i class='fa fa-trash' style='font-size:18px;color:red' title='Borrar'></i> </a>
                                <a href='ver_cliente_2.php?id=".$row['id']."'><i class='fa fa-eye' style='font-size:18px' title='Ver'></i> </a>
                         </td>";


                        
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Agregar enlaces a Bootstrap JS -->

<!-- Agregar jQuery para el filtrado de búsqueda -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#searchButton").click(function(){
        var searchText = $("#searchInput").val().toLowerCase();
        $("#tableBody tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
        });
    });
});
</script>
<?php include '../sistema_obsequios/footer.php'; ?>
</div>
</body>
</html>
