<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <?php
     function ejecutaConsulta($busqueda){
          //parametros de la conexion
          require("configConexion.php");

          //conexion a base de datos  con la forma PDO
          try{     
               $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
               $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conexion->exec("SET CHARACTER SET utf8");
               $consulta="SELECT CÓDIGOARTÍCULO,  NOMBREARTÍCULO, SECCIÓN, PRECIO, FECHA , IMPORTADO, PAÍSDEORIGEN from productos where  NOMBREARTÍCULO LIKE CONCAT(CONCAT('%',?),'%')";
               $result=$conexion->prepare($consulta);
               $result->execute(array($busqueda));
               echo "<table style='border:1px solid black;collapse:collapsed'>";
               echo "<hr><td>Código</td><td>Sección</td><td>Nombre </td><td>Precio </td><td>Fecha</td><td>Importado</td><td>Pais</td><td></th>";
               while($row =$result->fetch(PDO::FETCH_ASSOC)){
                    $codigo=$row["CÓDIGOARTÍCULO"];
                    $seccion=$row["SECCIÓN"];
                    $nombre=$row["NOMBREARTÍCULO"];
                    $precio=$row["PRECIO"];
                    $fecha=$row["FECHA"];
                    $importado=$row["IMPORTADO"];
                    $pais=$row["PAÍSDEORIGEN"];
                    echo "<tr><td> $codigo </td><td> $seccion  </td><td>   $nombre  </td><td>    $precio  </td><td>  $fecha  </td><td>   $importado  </td><td>   $pais  </td><td></tr>";
               }
               echo "</table>";
               $result->closeCursor();
          }
          catch(Exception $e){
               echo "Error: ".$e->getMessage();
          }finally{
               $conexion=null;
          }    
     } 
     ?>     
</head>
<body>
     <form action="" method="POST">
          <label for="Busqueda">Introduce el nombre de un artículo: <input type="text" name="buscar"></label>
          <input type="submit" name="enviando" value="Enviar">
     </form>
     <?php
     if (isset($_POST["enviando"])){
          ejecutaConsulta($_POST["buscar"]);
     }
     ?>     
</body>
</html>