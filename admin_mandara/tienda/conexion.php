<?php
// Datos de conexión a la base de datos
$servidor = "localhost"; // Cambia esto si tu servidor de base de datos está en otro lugar
$usuario = "u852886994_mandara"; // Nombre de usuario de la base de datos
$contrasena = "Mandara2023"; // Contraseña de la base de datos
$basedatos = "u852886994_mandara"; // Nombre de la base de datos

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

