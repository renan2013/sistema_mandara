<?php
if (!isset($_GET["texto1"]) || !isset($_GET["texto2"])|| !isset($_GET["texto3"])) {
    exit("No hay texto que colocar");
}
$rutaFuente = __DIR__ . "/" . "Roboto-Condensed.ttf";
 
$nombreImagen = $_GET["nombreImagen"];
$imagen = imagecreatefrompng($nombreImagen);
$color = imagecolorallocate($imagen, 255, 204, 0);
$texto1 = $_GET["texto1"];
$texto2 = $_GET["texto2"];
$texto3 = $_GET["texto3"];
$tamanio = 33;
$angulo = 0;
$espacio = 29;
$x = 330;
$y = 1290;
$x2 = 330;
$y2 = $y + $espacio + $tamanio;

$x3 = 330;
$y3 = $y2 + $espacio + $tamanio;
imagettftext($imagen, $tamanio, $angulo, $x, $y, $color, $rutaFuente, $texto1);
imagettftext($imagen, $tamanio, $angulo, $x2, $y2, $color, $rutaFuente, $texto2);
imagettftext($imagen, $tamanio, $angulo, $x3, $y3, $color, $rutaFuente, $texto3);
header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);