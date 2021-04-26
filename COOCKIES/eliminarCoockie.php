<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     //Para destruir la coockie indicamos un tiempo negativo
     setcookie("prueba", "Primera cookie registrada",time()-1,"/PHP_PILLS/coockies/actuacionCoockies/");    
?>
</body>
</html>