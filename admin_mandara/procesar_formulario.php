<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // Ensure JSON response

// Include database configuration
$config = include 'config.php';

$response = ['status' => 'error', 'message' => ''];

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_UNSAFE_RAW);
        $apellido = filter_input(INPUT_POST, 'Apellido', FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        $celular = filter_input(INPUT_POST, 'Celular', FILTER_UNSAFE_RAW);
        $edad = filter_input(INPUT_POST, 'fecha', FILTER_UNSAFE_RAW); // This is 'edad' in DB
        $mes = filter_input(INPUT_POST, 'mesNumerico', FILTER_SANITIZE_NUMBER_INT); // This is 'mes' in DB
        $direccion = filter_input(INPUT_POST, 'Direccion', FILTER_UNSAFE_RAW);
        $observaciones = filter_input(INPUT_POST, 'Observaciones', FILTER_UNSAFE_RAW);

        // Basic validation
        if (empty($nombre) || empty($apellido) || empty($email) || empty($celular)) {
            $response['message'] = 'Por favor, complete los campos obligatorios: Nombre, Apellido, Email, Celular.';
            echo json_encode($response);
            exit();
        }

        // Prepare SQL INSERT statement
        $sql = "INSERT INTO alumnos (nombre, apellido, email, edad, mes, celular, direccion, observaciones, created_at, updated_at) 
                VALUES (:nombre, :apellido, :email, :edad, :mes, :celular, :direccion, :observaciones, NOW(), NOW())";
        
        $stmt = $conexion->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':mes', $mes);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':observaciones', $observaciones);

        // Execute the statement
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Cliente registrado con éxito!';
        } else {
            $response['message'] = 'Error al registrar el cliente.';
        }
    } else {
        $response['message'] = 'Método de solicitud no válido.';
    }

} catch (PDOException $e) {
    $response['message'] = 'Error de base de datos: ' . $e->getMessage();
}

echo json_encode($response);

?>