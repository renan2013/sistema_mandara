<?php
if (!isset($_GET["texto1"]) || !isset($_GET["texto2"])|| !isset($_GET["texto3"])|| !isset($_GET["benefactor"])) {
    exit("No hay texto que colocar");
}
$rutaFuente = __DIR__ . "/" . "Roboto-Condensed.ttf";
 
$nombreImagen = $_GET["nombreImagen"];
$imagen = imagecreatefrompng($nombreImagen);
$color = imagecolorallocate($imagen, 255,215,0);
$texto1 = $_GET["texto1"];
$texto4 = $_GET["benefactor"];
$texto2 = $_GET["texto2"];
$texto3 = $_GET["texto3"];
$tamanio = 36;
$angulo = 0;
$espacio = 34;

$x = 310;
$y = 1540;

$x2 = 310;
$y2 = $y + $espacio + $tamanio;

$x3 = 310;
$y3 = $y2 + $espacio + $tamanio;

$x4 = 310;
$y4 = $y3 + $espacio + $tamanio;






imagettftext($imagen, $tamanio, $angulo, $x, $y, $color, $rutaFuente, $texto1);
imagettftext($imagen, $tamanio, $angulo, $x2, $y2, $color, $rutaFuente, $texto2);
imagettftext($imagen, $tamanio, $angulo, $x3, $y3, $color, $rutaFuente, $texto3);
imagettftext($imagen, $tamanio, $angulo, $x4, $y4, $color, $rutaFuente, $texto4);


header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);