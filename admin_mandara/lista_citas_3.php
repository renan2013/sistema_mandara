<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Citas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #botones{
        display: flex;
        width: 100%;
        padding-bottom: 10px;
    }
    .div_1{
        
        flex:3;
        margin-top: 20px;
    }
    .div_2{
        
        flex:1;
        text-align: right;
    }
 
    </style>
</head>
<body>
<?php include "templates/header.php"; ?>
<div class="container">
    <?php include '../sistema_obsequios/menu.php'; ?>
    <div id="botones">
        <div class="div_1"> <h3>Lista de Citas</h3></div>
    <div class="div_2">
      <a href="https://semillasdelagro.com/pruebas/admin_mandara/crear_cita.php"  class="btn btn-success mt-4">Registrar cita</a>
      
      
    </div>
  </div>
</div>
    <div class="container">
       
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    
                    <th>Fecha</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
                $sql = "SELECT c.*, a.nombre AS nombre_alumno, a.apellido AS apellido_alumno
                        FROM citas c
                        INNER JOIN alumnos a ON c.id = a.id
                        ORDER BY c.fecha DESC"; // Ordenar por fecha descendente

                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    $contador = 1;
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $contador . "</td>";
                        echo "<td>" . $fila["nombre_alumno"] ." ". $fila["apellido_alumno"] . "</td>";
                        echo "<td>" . $fila["fecha"] . "</td>";
                        echo "<td>" . $fila["hora_inicio"] . "</td>";
                        echo "<td>" . $fila["hora_final"] . "</td>";
                        echo "<td>" . $fila["estado"] . "</td>";
                        // En esta columna podrías agregar botones de edición, eliminación, etc.
                        echo "<td>
                                <a href='editar_cita.php?id_cita=".$fila['id_cita']."'><i class='fa fa-edit' style='font-size:18px;color:black' title='Editar'></i> </a>
                                <a href='borrar_cita.php?id_cita=".$fila['id_cita']."'><i class='fa fa-trash' style='font-size:18px;color:red' title='Borrar'></i> </a>
                              
                              </td>";

                        echo "</tr>";
                        $contador++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No se encontraron citas</td></tr>";
                }

                // Cerrar conexión
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
