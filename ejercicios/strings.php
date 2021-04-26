<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
<style>
.resaltar{
     color:red;
     font-weight:bold;
}
</style>
</head>
<body>
     <?php
          echo "<p class='resaltar'>Esto es una prueba</p>";
          echo "<p class=\"resaltar\">Esto es una prueba</p>";

          $vble1 = "Casa";
          $vble2 ="CASA";
          echo '$vble1 = "Casa" y $vble2 ="CASA"';
          echo "</br>";
          echo "la función strcmp  diferencia entre mayúsculas y minúsculas";
          echo "</br>";
          $resultado=strcmp($vble1,$vble2);
          if ($resultado)
               echo "No coinciden con strcmp";
          else 
                echo "Coinciden con strcmp";          
          echo "</br>";
          echo "la función strcasecmp no diferencia entre mayúsculas y minúsculas";
          echo "</br>";
          $resultado=strcasecmp($vble1,$vble2);
          if ($resultado)
               echo "No coinciden con strcasecmp";
          else 
                echo "Coinciden con strcasecmp";
     ?>
</body>
</html>