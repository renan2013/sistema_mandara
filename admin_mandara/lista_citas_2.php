<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Citas por Alumno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .premio {
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Record de citas por cliente </h3>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    
                    <th>Citas</th>
                    <th>Premio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Aquí tu conexión a la base de datos
                $conexion = new mysqli("localhost", "u852886994_mandara", "Mandara2023", "u852886994_mandara");
             

                // Verificar conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Consulta SQL
                $sql = "SELECT a.nombre, a.apellido, COUNT(c.id_cita) AS cantidad_citas
                        FROM alumnos a
                        LEFT JOIN citas c ON a.id = c.id
                        WHERE c.id_cita IS NOT NULL
                        GROUP BY a.nombre, a.apellido
                        ORDER BY cantidad_citas DESC, a.nombre, a.apellido";

                $resultado = $conexion->query($sql);

                
             
                if ($resultado->num_rows > 0) {
                    $contador = 1;
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $contador . "</td>";
                        echo "<td>" . $fila["nombre"]." ". $fila["apellido"] . "</td>";
                        echo "<td>" . $fila["cantidad_citas"] . "</td>";
                        // Verificar si el número de citas es igual a 54 o múltiplo de 4
                        if ($fila["cantidad_citas"] == 4 || $fila["cantidad_citas"] % 4 == 0) {
                            echo "<td class='premio'>Premio</td>";
                        } else {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                        $contador++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                }

                // Cerrar conexión
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
