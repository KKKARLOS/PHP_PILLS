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

          //Recogida de parametros
          //$busqueda=$_POST["buscar"];
          //conexion
          $conexion=mysqli_connect($db_host, $db_usuario, $db_pass, $db_nombre) or die("No se pudo conectar al servidor: ".mysqli_error());
          if (mysqli_connect_errno()){
               echo "Error de conexión al servidor";
               exit(); //Finalizar la ejecución de codigo pHp
          }
          mysqli_set_charset($conexion,"utf8");
          //query
          $consulta="select * from productos where  NOMBREARTÍCULO LIKE '%" .$busqueda ."%'";
         // $consulta="select * from productos where  NOMBREARTÍCULO='$busqueda";
          echo $consulta;
          $result=mysqli_query($conexion,$consulta);

          //Recorrer el resultado

          echo "<table style='border:1px solid black;collapse:collapsed'>";
          echo "<hr><td>Código</td><td>Sección</td><td>Nombre </td><td>Precio </td><td>Fecha</td><td>Importado</td><td>Pais</td><td></th>";
          while ($row = mysqli_fetch_array($result)){ 
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
          // Liberar resultados
          mysqli_free_result($result);
          // Cerrar la conexión
          mysqli_close($conexion);
     }
     ?>          
</head>
<body>
     <form action="" method="POST">
          <label for="Busqueda"><input type="text" name="buscar"></label>
          <input type="submit" name="enviando" value="Enviar">
     </form>
     <?php
     if (isset($_POST["enviando"])){
          ejecutaConsulta($_POST["buscar"]);
     }
     ?>     
</body>
</html>