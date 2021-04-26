<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
 <?php
     echo "<table style='width:90%;border:1px solid black;collapse:collapsed'>";
     echo "<tr><th>Código</th><th>Sección</th><th>Nombre </th><th>Precio </th><th>Fecha</th><th>Importado</th><th>Pais</th><th></tr>";
     foreach($aProductos as $row){
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
