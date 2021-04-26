<?php
define("AUTOR","Juan");

echo AUTOR;
echo "</br>";
//No se pueden meter las constantes dentro de las comillas dobles no lo reconoce a diferencia de las variables
echo "El autor es : AUTOR";
echo "</br>";
echo "El autor es : " . AUTOR;
echo "</br>";
echo "La  linea de esta instrucción es la " . __LINE__;
echo "</br>";
echo "El nombre del fichero y su ruta en donde se encuentra es : " . __FILE__;
echo "</br>";
echo "El directorio en donde nos encontramos es : ". __DIR__;
echo "</br>";
?>