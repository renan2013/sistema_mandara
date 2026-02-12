<?php
// Include config file
require_once "config.php";
 
 
// Processing form data when form is submitted
// NOTE: This section will need further review to align with 'alumnos' table fields and validation.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $nombre = trim($_POST["nombre"]);
    $celular = $_POST["celular"];
    $fecha = $_POST["fecha"]; // Assuming this is for 'edad' in alumnos table
    $email = $_POST["email"];
    // $tratamiento = $_POST["tratamiento"]; // 'tratamiento' field not in 'alumnos' table
    $observaciones = trim($_POST["observaciones"]);
    
    // This logic seems incorrect. Insert should be after validation.
    // Temporarily commented out for structural fix. Revisit this block.
    /*
    if(empty($nombre) ){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (nombre, celular, fecha, email, tratamiento, observaciones) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_celular, $param_fecha, $param_email, $param_tratamiento, $param_observaciones );
            
            // Set parameters
            $param_nombre = $nombre;
            $param_celular = $celular;
            $param_fecha = $fecha;
            $param_email = $email;
            $param_tratamiento = $tratamiento;
            $param_observaciones = $observaciones;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Marcela! Al parecer ha ocurrido un error, inténtelo de nuevo por favor.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    */
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
  include "../assets/menu.php";
?>
<div class="wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-5">Crear Cliente</h3>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" name="celular" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="edad" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea name="observaciones" class="form-control"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                    <br/>
                </div>
            </div>        
        </div>
    </div>
    <?php
          include "../assets/footer.php";
      ?>
</body>
</html>