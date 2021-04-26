<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <?php
     //parametros de la conexion
     require("configConexion.php");

     //conexion con la forma procedimental
     /*$conexion=mysqli_connect($db_host, $db_usuario, $db_pass, $db_nombre) or die("No se pudo conectar al servidor: ".mysqli_error());
   
     if (mysqli_connect_errno()){
          echo "Error de conexión al servidor";
          exit(); //Finalizar la ejecución de codigo pHp
     }*/
     //conexion con la forma POO
     $conexion=new mysqli($db_host, $db_usuario, $db_pass, $db_nombre);
     if ($conexion->connect_errno) echo "Falló la conexión: $conexion->connect_errno ";

     //Actualizar charset de la  forma procedimental     
     //mysqli_set_charset($conexion,"utf8");
    
     //Actualizar charset de la  forma POO     
     $conexion->set_charset("utf8");
    
     //query
     $consulta="select * from productos";
     //Ejecutar query  forma procedimental     
     //$result=mysqli_query($conexion,$consulta);

     //Ejecutar query  forma POO
     $result=$conexion->query($consulta);      
     if ($conexion->connect_errno) die($conexion->error);

     //Recorrer el resultado
     
     // Forma Procedimental 
     /*while ($row = mysqli_fetch_array($result)){ 
          $clave=$row["clave"];
          $nombre=$row["nombre"];
          $edad=$row["edad"];
          echo "Clave: $clave  Nombre:  $nombre Edad:   $edad <br>";
     }*/
     //Forma POO
     echo "<table style='border:1px solid black;collapse:collapsed'>";
     echo "<hr><td>Código</td><td>Sección</td><td>Nombre </td><td>Precio </td><td>Fecha</td><td>Importado</td><td>Pais</td><td></th>";

     while ($row =$result->fetch_assoc()){ 
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
     //mysqli_free_result($result);

     // Cerrar la conexión con la forma procedimental
     //mysqli_close($conexion);

     // Cerrar la conexión con la forma POO
     $conexion->close();
     ?>
</body>
</html>