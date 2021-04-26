<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     //Si la coockie no existiese daría error para asegurarnos de su existencia haríamos:
     if (isset($_COOKIE["prueba"]))
          echo $_COOKIE["prueba"];     
     else
          echo "La coockie no se ha creado";
?>
</body>
</html>