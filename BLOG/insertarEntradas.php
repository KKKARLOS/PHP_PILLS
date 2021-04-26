<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     if ($_FILES["imagen"]["error"]){
          switch  ($_FILES["imagen"]["error"]){
               case 1: //error exceso de tamaño de archivo en php.ini
                    echo "El tamaño del archivo excede el valor permitido en el servidor";
                    break;
               case 2: //error El tamaño del archivo excede el valor permitido en el formulario (<input type="hidden" name="MAX_TAM" value="2097152">;
                    echo "El tamaño del archivo excede el valor permitido en el formulario ";
                    break;
               case 3: //Corrupción del archivo
                    echo "El envío del archivo se interrumpio";
                    break;   
               case 4: //No hay fichero especificado
                    echo "No se ha enviado ningún archivo";
                    break;                               
          }
     }else{
          echo "Imagen subida correctamente";
          if (isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"]==UPLOAD_ERR_OK) ){
               //ruta de la carpeta destino en servidor
               $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/PHP_PILLS/BLOG/uploads/";
               echo $carpeta_destino;
               $nombre_imagen=$_FILES["imagen"]["name"];

               //Movemos la imagen del directorio temporal (origen) a la carpeta destino
               move_uploaded_file($_FILES['imagen']["tmp_name"],$carpeta_destino . $nombre_imagen);
               echo "El archivo " . $nombre_imagen . "se ha copiado correctamente en el directorio uploads";

               //parametros de la conexion
               require("configConexion.php");
                //Recogida de parametros
               $titulo=$_POST["titulo"];
               $fecha=date("Y-m-d H:i:s");
               echo $fecha;
               $comentarios=$_POST["comentarios"];

               //conexion a base de datos  con la forma PDO
               try{     
                    $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conexion->exec("SET CHARACTER SET utf8");
                    //query
                    $consulta="insert into BLOG_ENTRADAS (titulo, fecha, comentarios, foto) values (:titulo,:fecha,:comentarios,:foto) ";
                    $result=$conexion->prepare($consulta);
                    $result->execute(array(":titulo"=> $titulo, ":fecha"=> $fecha, ":comentarios"=> $comentarios, ":foto"=> $nombre_imagen));
                    echo "Numero de registros insertados: "  . $result->rowCount() ; 
                    echo "<br><br>";
                    echo "<a href='blog.php'>Ir al blog</a>";
                    echo "<br><br>";
                    echo "<a href='entradas.php'>Crear entrada para el blog</a>";
               }
               catch(Exception $e){
                    echo "Error: ".$e->getMessage();
               }finally{
                    $conexion=null;
               }    

          }else{
               echo "Error. El archivo " . $nombre_imagen . "no se ha copiado correctamente en el directorio uploads";
          }
     }
?>
</body>
</html>
