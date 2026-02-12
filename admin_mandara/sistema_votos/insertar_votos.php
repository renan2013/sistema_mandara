<?php
// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $numero_mesa = $_POST["numero_mesa"];
    $liberacion = $_POST["campo1"];
    $unidad = $_POST["campo2"];
    $republicano = $_POST["campo3"];
    $puriscal_en_marcha = $_POST["campo4"];
    $personero = $_POST["campo5"];

    $servername = "localhost"; // Cambia esto si tu servidor de base de datos está en un host diferente
    $username = "u852886994_mandara"; // Cambia esto por el nombre de usuario de tu base de datos
    $password = "Mandara2023"; // Cambia esto por la contraseña de tu base de datos
    $dbname = "u852886994_mandara"; // Cambia esto por el nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO mesas (numero_mesa, liberacion, unidad, republicano, puriscal_en_marcha, personero) VALUES ('$numero_mesa', '$liberacion', '$unidad', '$republicano', '$puriscal_en_marcha', '$personero')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Si la inserción fue exitosa, redirigir al formulario con mensaje de éxito
        $mensaje = "La mesa ".$numero_mesa." ha sido insertada correctamente";
        $tipoMensaje = "success";
        header("Location: formulario_mesas.php?mensaje=$mensaje&tipo=$tipoMensaje");
        exit;
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

   // Cerrar la conexión
   $conn->close();
} else {
    echo "No se han recibido datos del formulario.";
}
?>