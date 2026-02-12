<?php
// Datos de conexión a la base de datos MySQL
$host = 'localhost';
$username = 'u852886994_mandara';
$password = 'Mandara2023';
$database = 'u852886994_mandara';

// Conexión a la base de datos
$conn = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$fecha = $_POST['fecha'];
$mesNumerico = $_POST['mesNumerico'];

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$email = $_POST['Email'];
$celular = $_POST['Celular'];
$direccion = $_POST['Direccion'];
$observaciones = $_POST['Observaciones'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO alumnos(edad, mes, nombre, apellido, email, celular, direccion, observaciones) VALUES ('$fecha', '$mesNumerico', '$nombre', '$apellido', '$email', '$celular', '$direccion', '$observaciones' )";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    
    echo "Datos insertados correctamente";
    
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

