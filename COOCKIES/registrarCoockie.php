<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     //Al crear la coockie si no especificas el tiempo de vida de la coockie 
     //esta coockie se eleminará al cerrar el navegador
     
      //sin tiempo
     //setcookie("prueba", "Primera cookie registrada");   

     //con 30 sg de tiempo desde que se abre el navegador. La función time recoge ese momento.
     //setcookie("prueba", "Primera cookie registrada",time()+30);    

     //Podemos especificar la ruta o zona desde la que queremos en que actue la coockie
     setcookie("prueba", "Primera cookie registrada",time()+30,"/PHP_PILLS/coockies/actuacionCoockies/");    

?>
</body>
</html>