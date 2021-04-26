<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
 <?php
//Arrray bidimensional
$alimentos=[ 
                            ["frutas","Kiwi","Mandarina","Manzana"],
                            ["leche","Vaca","Coco"],
                            ["carne","Lomo","Pata"]
                          ];        
    //Sin bucle

    //La primera fila
    echo $alimentos[0][0];
    echo "<br>";
    echo $alimentos[0][1];
    echo "<br>";
    echo $alimentos[0][2];
    echo "<br>";
    echo $alimentos[0][3];
    echo "<br>";
    // Con el resto de filas igual

    //Con bucle (TODO)
    for ($row = 0; $row < count($alimentos); $row++) {
      echo "<p><b>".$alimentos[$row][0]."</b></p>";
      echo "<ul>";
      for ($col = 1; $col < count($alimentos[$row]); $col++) {
        echo "<li>".$alimentos[$row][$col]."</li>";
      }
      echo "</ul>";
    }       
    
    //
    echo var_dump($alimentos);


 ?>    
</body>
</html>