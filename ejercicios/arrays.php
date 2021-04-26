<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
     
     //Arrays indexados

     //forma1
     $semana[ ]="Lunes";
     $semana[ ]="Martes";
     $semana[ ]="Miércoles";
     //forma2 (lo mismo pero más recomendable)
     $semana[0]="Lunes";
     $semana[1 ]="Martes";
     $semana[2 ]="Miércoles";  
     //forma3(lo mismo pero más corta y recomendable. Nota : Son parentesis y no corchetes)
     $semana=array("Lunes","Martes","Miércoles");

     echo "<br>Mostrar los tres primeros dias de la semana<br>";

     for($i=0;$i<count($semana);$i++){
          echo $semana[$i] . "<br>";
     }
     
     //Para agregar  elementos al final del array indexado
     echo "<br>Agrego el resto de los dias<br>";

     $semana[ ]="Jueves";
     $semana[ ]="Viernes";
     $semana[ ]="Sabado";
     $semana[ ]="Domingo";

     for($i=0;$i<count($semana);$i++){
          echo $semana[$i] . "<br>";
     }
     
     //Ordenar los elmentos del array
     echo "<br>Ordeno los dias de la semana<br>";
     sort($semana);
     for($i=0;$i<count($semana);$i++){
          echo $semana[$i] . "<br>";
     }
      //Arrays asociativos

      // Se utiliza un operador flecha parecido al -> ya utilizado con propiedades y métodos de clases 
      // pero que no es el mismo para arrays que sería el siguiente operador:  =>

     $datos = array("Nombre"=>"Juan","Apellido"=>"Gómez","Edad"=>21);

     echo "<br>Preguntar si es un array<br>";

     //$datos="Karlos";
     if (is_array($datos)){
          echo "Es un array<br>";
          echo $datos["Apellido"] . "<br>";
     }
         
     else
          echo "No es un array<br>";

              
     //Each para recorrer array asociativos: Nombre-array as $elemento-clave=>$elemento-valor

     echo "<br>Recorrer array asociativos:<br>";

     foreach($datos as $clave=>$valor){
          echo " A la clave: $clave le corresponde el valor: $valor <br>";
     }
    

     //Agregar  elementos más a un array asociativo

     echo "<br>Agrego elementos al array asociativo:<br>";
     $datos ["Pais"]="España";
     $datos ["DNI"]="34554345";

     foreach($datos as $clave=>$valor){
          echo " A la clave: $clave le corresponde el valor: $valor <br>";
     }
     ?>
</body>
</html>