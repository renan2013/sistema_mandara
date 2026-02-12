<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Process delete operation after confirmation
if(isset($_POST["id_cita"]) && !empty($_POST["id_cita"])){
    // Include config file
    $config = include 'config.php';
    
    // Prepare a delete statement
    $sql = "DELETE FROM citas WHERE id_cita = ?";
    
    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
        $stmt = $conexion->prepare($sql);
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(1, $param_id_cita, PDO::PARAM_INT);
        
        // Set parameters
        $param_id_cita = trim($_POST["id_cita"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: lista_citas.php"); // Redirect to client list
            exit();
        } else{
            echo "Oops! Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
        }
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id_cita"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php"); // Assuming error.php exists
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php include "assets/menu.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-5 mb-3">Eliminar Cita</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                    <input type="hidden" name="id_cita" value="<?php echo trim($_GET["id_cita"]); ?>"/>
                    <p>¿Está seguro de que desea eliminar este registro de cita? El registro será eliminado definitivamente.</p>
                    <p>
                        <input type="submit" value="Sí" class="btn btn-danger">
                        <a href="lista_citas.php" class="btn btn-secondary ml-2">No</a>
                    </p>
                </div>
            </form>
        </div>
    </div>        
</div>
    
<?php include "assets/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>