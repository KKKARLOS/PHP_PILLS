<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
     include("config.php");
     include ("conexion.php");
     $id = $_GET["id"];
     $conexion->query("delete from datos_usuarios where id=$id");
     header("Location:index.php");
     ?>
</body>
</html>