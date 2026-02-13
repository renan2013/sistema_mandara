<?php
if (!isset($_GET["benefactor"]) || !isset($_GET["mensaje"])|| !isset($_GET["fecha"])) {
    exit("No hay texto que colocar");
}
$rutaFuente = __DIR__ . "/" . "Roboto-Condensed.ttf";
$rutaFuente_benefactor = __DIR__ . "/" . "StyleScript-Regular.ttf";
 
$nombreImagen = $_GET["nombreImagen"];
$imagen = imagecreatefrompng($nombreImagen);

$color = imagecolorallocate($imagen, 255,255,0);
$texto1 = $_GET["benefactor"];
$texto2 = $_GET["mensaje"];
$texto3 = $_GET["fecha"];



$tamanio_benefactor = 60;
$tamanio_mensaje = 36;
$tamanio_fecha = 25;



$anchoMaximoMensaje = 380;






$angulo = 0;
$espacio = 34;

$x = 140;
$y = 800;

$x2 = 140;
$y2 = 950;

$x3 = 140;
$y3 = 1100;


// Función para dibujar texto con múltiples líneas
function dibujarTexto($imagen, $tamanio_mensaje,$angulo, $x2,$y2, $anchoMaximoMensaje,$rutaFuente,  $texto2, $color) {
   
    // Dividir el texto en líneas si es demasiado largo
    $lineas = explode("\n", wordwrap($texto2, $anchoMaximoMensaje, "\n", false));

    // Dibujar cada línea por separado
    foreach ($lineas as $linea) {
        imagettftext($imagen,$tamanio_mensaje, $angulo, $x2, $y2, $color,$rutaFuente, $linea);
        $y2 += 1.5 * $tamanio_mensaje; // Ajustar la posición vertical para la siguiente línea
    }
}



imagettftext($imagen, $tamanio_benefactor, $angulo, $x, $y, $color, $rutaFuente_benefactor, $texto1);



// Aplicar wordwrap solo si el texto es demasiado largo
if (strlen($texto2) > $anchoMaximoMensaje) {
    dibujarTexto($imagen, $tamanio_mensaje,$angulo, $x2, $y2, $anchoMaximoMensaje,$rutaFuente, $texto2, $color);
} else {
    imagettftext($imagen, $tamanio_mensaje, $angulo, $x2, $y2, $color, $rutaFuente, $texto2);
}

imagettftext($imagen, $tamanio_fecha, $angulo, $x3, $y3, $color, $rutaFuente, $texto3);



header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);