<?php
if (!isset($_GET["texto1"]) || !isset($_GET["texto2"])) {
    exit("No hay texto que colocar");
}

// Ruta de la fuente
$rutaFuente1 = __DIR__ . "/" . "ComforterBrush-Regular.ttf";
// Ruta de la fuente 2
$rutaFuente2 = __DIR__ . "/" . "Roboto-Regular.ttf";

// Nombre de la imagen
$nombreImagen = $_GET["nombreImagen"];

// Crear una imagen desde un archivo PNG
$imagen = imagecreatefrompng($nombreImagen);

// Color del texto
$color1 = imagecolorallocate($imagen, 255, 255, 255);
$color2 = imagecolorallocate($imagen, 255, 255, 255);

// Textos
$texto1 = $_GET["texto1"];
$texto2 = $_GET["texto2"];

// Tamaño de la fuente
$tamanio_1 = 180;
$tamanio_2 = 50;

// Angulo del texto
$angulo = 0;

// Espacio entre líneas
$espacio = 28;

// Dimensiones de la imagen de fondo
$anchoImagen = imagesx($imagen);
$altoImagen = imagesy($imagen);

// Función para dibujar texto en varias líneas con justificación y centrado
function dibujarTextoJustificado($imagen, $tamanio, $angulo, &$y, $color, $rutaFuente, $texto, $espacio, $anchoImagen) {
    // Obtener el ancho máximo de la línea para el texto justificado
    $anchoMaximo = $anchoImagen - 480;

    // Dividir el texto en palabras
    $palabras = explode(" ", $texto);
    $linea = '';
    $lineas = array();

    // Construir líneas de texto justificado
    foreach ($palabras as $palabra) {
        $lineaTest = $linea . ' ' . $palabra;
        $dimensiones = imagettfbbox($tamanio, $angulo, $rutaFuente, $lineaTest);

        // Si la línea supera el ancho máximo, agregar la línea actual a las líneas y comenzar una nueva línea
        if ($dimensiones[4] - $dimensiones[6] > $anchoMaximo) {
            $lineas[] = $linea;
            $linea = $palabra;
        } else {
            $linea = $lineaTest;
        }
    }
    $lineas[] = $linea;

    // Dibujar cada línea por separado
    foreach ($lineas as $linea) {
        // Obtener dimensiones de la línea de texto
        $dimensiones = imagettfbbox($tamanio, $angulo, $rutaFuente, $linea);

        // Calcular posición X para centrar el texto
        $x = ($anchoImagen - ($dimensiones[4] - $dimensiones[6])) / 2;

        // Dibujar la línea de texto
        imagettftext($imagen, $tamanio, $angulo, $x, $y, $color, $rutaFuente, $linea);

        // Ajustar la posición vertical para la siguiente línea
        $y += $espacio + $tamanio;
    }
}

// Posición inicial del primer texto
$y1 = 1900;

// Posición inicial del segundo texto
$y2 = 2050;

// Dibujar el primer texto centrado y justificado
dibujarTextoJustificado($imagen, $tamanio_1, $angulo, $y1, $color1, $rutaFuente1, $texto1, $espacio, $anchoImagen);

// Dibujar el segundo texto centrado y justificado
dibujarTextoJustificado($imagen, $tamanio_2, $angulo, $y2, $color2, $rutaFuente2, $texto2, $espacio, $anchoImagen);

// Encabezado para indicar que se enviará una imagen PNG
header("Content-Type: image/png");

// Mostrar la imagen
imagepng($imagen);

// Liberar la memoria utilizada por la imagen
imagedestroy($imagen);
?>
