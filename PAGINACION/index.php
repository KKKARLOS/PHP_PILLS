<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     </head>
     <body>
     <?php
     //function ejecutaConsulta($busqueda){
          //parametros de la conexion
          require("configConexion.php");

          //conexion a base de datos  con la forma PDO
          try{     
               $rowsPage=6;
               if (isset($_GET["pageActive"]))  $pageActive=$_GET["pageActive"];
               else $pageActive=1;
               $empezarDesde=($pageActive-1)*$rowsPage;
               
               $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
               $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conexion->exec("SET CHARACTER SET utf8");

               $consulta="SELECT CÓDIGOARTÍCULO,  NOMBREARTÍCULO, SECCIÓN, PRECIO, FECHA , IMPORTADO, PAÍSDEORIGEN 
                                                  from productos";
               $result=$conexion->prepare($consulta);
               //$result->execute(array($busqueda));
               $result->execute(array());
               
               $totalRows=$result->rowCount();
               $totalPages=ceil($totalRows/$rowsPage);    //La función ceil nos redondea el resultado.

               echo "Numero de registros leídos: "  .  $totalRows . "</br>"; 
               echo "Mostramos $rowsPage  registros por página: </br>"; 
               echo "Mostrando la página $pageActive de  $totalPages </br>"; 

               $result->closeCursor();

               $consulta_limit="SELECT CÓDIGOARTÍCULO,  NOMBREARTÍCULO, SECCIÓN, PRECIO, FECHA , IMPORTADO, PAÍSDEORIGEN
                     from productos LIMIT $empezarDesde, $rowsPage";
               $result=$conexion->prepare($consulta_limit);
               //$result->execute(array($busqueda));        
               $result->execute(array());
               
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

          //------------------------------------------------------------------------Paginación------------------------------------------------------------------

          for($i=1;$i<=$totalPages;$i++){
               echo  "<a href='index.php?pageActive=" .$i . " ' > " .$i  ."<a/>  ";
          }
     //} 
     ?>     


</body>
</html>