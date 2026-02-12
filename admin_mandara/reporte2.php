<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Importe de Citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Consulta de Importe de Citas</h2>
        <?php
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "u852886994_mandara";
        $password = "Mandara2023";
        $dbname = "u852886994_mandara";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta para obtener la suma del importe agrupado por mes
        $sql_importe_mes = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS mes, SUM(importe) AS total_importe FROM citas GROUP BY mes";
        $result_importe_mes = $conn->query($sql_importe_mes);

        if ($result_importe_mes->num_rows > 0) {
            // Mostrar el resultado
            echo "<table class='table'>";
            echo "<thead><tr><th>Mes</th><th>Importe</th></tr></thead>";
            echo "<tbody>";
            while ($row_importe_mes = $result_importe_mes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_importe_mes["mes"] . "</td>";
                echo "<td>c/." . number_format($row_importe_mes["total_importe"], 2) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No se encontraron resultados.";
        }

        // Cerrar conexión
        $conn->close();
        ?>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>