<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
          session_start();
          if (!isset($_SESSION["usuario"])){
               echo "No se permite el acceso";
               header("location:index.php");
          }
     ?>
     <h1>Bienvenido/a  <?php echo $_SESSION["usuario"]; ?></h1>
     <a href="logout.php">Cerrar Sesión</a>
     <p>Te encuentras en tu zona personal</p>
</body>
</html>