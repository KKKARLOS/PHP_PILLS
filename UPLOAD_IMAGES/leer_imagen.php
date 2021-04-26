     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
     <?php
          require("configConexion.php");
          $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conexion->exec("SET CHARACTER SET utf8");
          $consulta="SELECT foto from PRODUCTOS WHERE CÓDIGOARTÍCULO='AR01' ";
          $result=$conexion->prepare($consulta);
          $result->execute(array());
          $row =$result->fetch(PDO::FETCH_ASSOC);
          $imagen=$row["foto"];
     ?>     
     </head>
     <body>
     <div>
          <img src='<?php echo "/PHP_PILLS/upload_images/uploads/" . $imagen; ?>' alt=" ">
     </div>
     </body>
     </html>