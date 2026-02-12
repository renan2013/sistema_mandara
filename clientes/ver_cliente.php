<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM alumnos WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $nombre = $row["nombre"];
                $apellido = $row["apellido"];
                $email = $row["email"];
                $celular = $row["celular"];
                $edad = $row["edad"];
                $direccion = $row["direccion"];
                $observaciones = $row["observaciones"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       .wrapper{
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
        <?php
          include "../menu.php";
          
        ?>
            <div class="row">
           
                <div class="col-md-12">
                    <h3 class="mt-5 mb-3">Ver Cliente</h3>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p><b><?php echo $nombre; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <p><b><?php echo $apellido; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p><b><?php echo $email; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <p><b><?php echo $celular; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <p><b><?php echo $edad; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <p><b><?php echo $direccion; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Observaciones</label>
                        <p><b><?php echo $observaciones; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Volver</a></p>
                </div>
            </div>        
        </div>
    </div>
    <br/>
    <?php
          include "../footer.php";
      ?>
</body>
</html>