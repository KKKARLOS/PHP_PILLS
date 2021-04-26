<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          .contenedor{
               width:80%;
               margin:auto;
               text-align:center;
          }
     </style>
     </head>
     <body>
     <?php
     //function ejecutaConsulta($busqueda){
          //parametros de la conexion
          require("configConexion.php");

          //conexion a base de datos  con la forma PDO
          try{     
               $rowsPage=3;
               if (isset($_GET["pageActive"]))  $pageActive=$_GET["pageActive"];
               else $pageActive=1;
               $empezarDesde=($pageActive-1)*$rowsPage;
             
               $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
               $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conexion->exec("SET CHARACTER SET utf8");

               $consulta="SELECT * from blog_entradas order by fecha desc";
               $result=$conexion->prepare($consulta);
               //$result->execute(array($busqueda));
               $result->execute(array());
               
               $totalRows=$result->rowCount();
               $totalPages=ceil($totalRows/$rowsPage);    //La función ceil nos redondea el resultado.

               /*echo "Numero de registros leídos: "  .  $totalRows . "</br>"; 
               echo "Mostramos $rowsPage  registros por página: </br>"; 
               echo "Mostrando la página $pageActive de  $totalPages </br>"; 
               */
               $result->closeCursor();

               $consulta_limit="SELECT * from blog_entradas order by fecha desc  LIMIT $empezarDesde, $rowsPage ";  //           from productos LIMIT $empezarDesde, $rowsPage";
               $result=$conexion->prepare($consulta_limit);
               //$result->execute(array($busqueda));        
               $result->execute(array());
               echo "<div class='contenedor'>";
               echo "<h1>BLOG</h1>";
               echo "<hr>";
               while($row =$result->fetch(PDO::FETCH_ASSOC)){
                    $titulo=$row["titulo"];
                    $fecha=$row["fecha"];
                    $comentarios=$row["comentarios"];
                    $foto=$row["foto"];

                    echo "<h3>$titulo</h3>";
                    echo "<h4>$fecha</h4>";
                    echo "<div style='width:400px; margin:auto; text-align:center'>$comentarios</div><br><br>";
                    if ($foto!="") 
                         echo "<img src='/PHP_PILLS/blog/uploads/" . $foto ."' width='700px' alt=' '>";
                    echo "<hr>";
               }
               $result->closeCursor();
               echo "<br><br>";
               echo "<a href='entradas.php'>Crear entrada para el blog</a><br><br><br><br> ";        

               //------------------------------------------------------------------------Paginación------------------------------------------------------------------
               echo "<h1>";
               for($i=1;$i<=$totalPages;$i++){
                    echo  "<a href='blog.php?pageActive=" .$i . " ' > " .$i  . "<a/>    ";
               }
               echo "</h1>";
          //} */
               echo "</div>";       
          }

          catch(Exception $e){
               echo "Error: ".$e->getMessage();
          }finally{
               $conexion=null;
          }    

     ?>     


</body>
</html>