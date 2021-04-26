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
          //$consulta="select * from productos where  PAÍSDEORIGEN LIKE '%" .$busqueda ."%'";
          $consulta="SELECT CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA from productos where  PAÍSDEORIGEN = ?";
          echo "$consulta<br><br>";
          //$result=mysqli_query($conexion,$consulta);

          $result=mysqli_prepare($conexion,$consulta);
          
          if (!$result){
               echo "Error en la consulta";
               var_dump(mysqli_error($conexion));
          }
          else
          {
          //parametros
          // Si el tipo de dato del parámetro fuera un entero pondríamos una "i" y si  fuera decimal una "d"
               mysqli_stmt_bind_param($result, "s", $busqueda);
               mysqli_stmt_execute($result);
               mysqli_stmt_store_result($result); 
               //$contador=mysqli_stmt_affected_rows($result); //Para insert, update, delete
               $contador=mysqli_stmt_num_rows($result);   //Para select
               $ok=mysqli_stmt_bind_result($result,$codigo,$seccion,$nombre, $precio,$fecha);
               echo "Articulos encontrados: $contador<br><br>";
               echo "<table style='border:1px solid black;collapse:collapsed'>";
               echo "<tr><th>Código</th><th>Sección</th><th>Nombre </th><th>Precio </th><th>Fecha</th></tr>";
               while (mysqli_stmt_fetch($result)){ 
                    echo "<tr><td> $codigo </td><td> $seccion  </td><td>   $nombre  </td><td>    $precio  </td><td>  $fecha  </td></tr>";
               }
               echo "</table>";
          }
          // Liberar resultados
          /* cerrar sentencia */
          mysqli_stmt_close($result);
          // Cerrar la conexión
          mysqli_close($conexion);
    }
     ?>          
</head>
<body>
     <form action="" method="POST">
          <label for="Busqueda">Teclea un país: <input type="text" name="buscar"></label>
          <input type="submit" name="enviando" value="Enviar">
     </form>
     <?php
     if (isset($_POST["enviando"])){
          ejecutaConsulta($_POST["buscar"]);
     }
     ?>     
</body>
</html>