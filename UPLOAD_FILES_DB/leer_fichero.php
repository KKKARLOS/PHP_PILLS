
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
          //$conexion->exec("SET CHARACTER SET utf8");   //  NO FUNCIONA. HAY QUE UTILIZARLO COMO ABAJO
          $conexion->exec("SET NAMES utf8");
          $consulta="SELECT id, nombre, tipo, contenido from ARCHIVOS WHERE id=21";
          $result=$conexion->prepare($consulta);
          $result->execute(array());
          $row =$result->fetch(PDO::FETCH_ASSOC);
          $contenido=$row["contenido"];
          $tipo=$row["tipo"];
          $nombre=$row["nombre"];
     ?>     
     </head>
     <body>
     <div><?php
          echo "Nombre:  $nombre <br>";
          echo "Tipo:  $tipo <br>";
          if($tipo == 'image/jpeg' || $tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/gif'){
               echo "<br>";
               echo "Mostrando imagen: <br>" . "<img src='data:$tipo; base64," . base64_encode($contenido) . "'>";
               
           }else if ($tipo == 'text/plain' || $tipo == 'application/pdf'){
               echo "<br>Mostrando texto o pdf.<br>";
       ?> <!-- Cerramos temporalmente php-->
       
           <object data="data:<?php echo $tipo ?>;base64,<?php echo base64_encode($contenido) ?>" type="<?php echo $tipo ?>" style="height:600px;width:80%"></object>
       
      <?php // volvemos a abrir php para cerrar el if
          }else{ echo"Formato no reconocido";} // end if elif else
           
       ?>

     </div>
     </body>
     </html>