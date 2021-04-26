<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <?php          
          require("busquedaProductos_clase_POO_PDO.php");
          $pais=$_POST["buscar"];
          $productos = new busquedaProductos();
          $arrayProductos = $productos->getProductos( $pais)
     ?>          
</head>
<body>
<?php

//Recorrer el resultado

echo "<table style='border:1px solid black;collapse:collapsed'>";
echo "<hr><td>Código</td><td>Sección</td><td>Nombre </td><td>Precio </td><td>Fecha</td><td>Importado</td><td>Pais</td><td></th>";
foreach($arrayProductos as $row){
     $codigo=$row["CÓDIGOARTÍCULO"];
     $seccion=$row["SECCIÓN"];
     $nombre=$row["NOMBREARTÍCULO"];
     $precio=$row["PRECIO"];
     $fecha=$row["FECHA"];
     $importado=$row["IMPORTADO"];
     $pais=$row["PAÍSDEORIGEN"];
     echo "<tr><td> $codigo </td><td> $seccion  </td><td>   $nombre  </td><td>    $precio  </td><td>  $fecha  </td><td>   $importado  </td><td>   $pais  </td><td></tr>";
}
echo "</table>";

?>          
</body>
</html>