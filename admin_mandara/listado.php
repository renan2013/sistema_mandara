<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$link = mysqli_connect("localhost", "u852886994_mandara", "Mandara2023", "u852886994_mandara");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

if ($resultado = mysqli_query($link, "SELECT * FROM alumnos ORDER BY nombre")) {

    /* determinar el número de filas del resultado */
    $registros = mysqli_num_rows($resultado);

    echo "Nro de clientes registrados: ".$registros;
    echo "<br/>";
    

    /* cerrar el resulset */
    mysqli_free_result($resultado);
}

if ($resultado = mysqli_query($link, "SELECT * FROM citas ORDER BY id_cita")) {

    /* determinar el número de filas del resultado */
    $registros = mysqli_num_rows($resultado);

    echo "Nro de citas: ".$registros;
    

    /* cerrar el resulset */
    mysqli_free_result($resultado);
}

/* cerrar la conexión */
mysqli_close($link);
?>
    
</body>
</html>