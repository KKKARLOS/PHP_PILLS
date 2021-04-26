<?php
     $nombre_fichero=$_FILES["fichero"]["name"];
     $type_fichero=$_FILES["fichero"]["type"];
     $size_fichero=$_FILES["fichero"]["size"];
     //Limitamos la subida de archivos a un tamaño menor a 2 megas
     echo " Tamaño del fichero " . $size_fichero . "</br>";
     if ($size_fichero>5000000){
          echo "El tamaño del fichero excede el límite permitido de 2 megas";
          exit();
     } 
     //ruta de la carpeta destino en servidor
     $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/PHP_PILLS/upload_images/uploads/";
     echo $carpeta_destino;

     //Movemos la fichero del directorio temporal (origen) a la carpeta destino
     move_uploaded_file($_FILES['fichero']["tmp_name"],$carpeta_destino . $nombre_fichero);



     //Registrar en base de datos (la ruta de la carpeta en donde se encuentra la fichero)

     //parametros de la conexion
     require("configConexion.php");

     //conexion a base de datos  con la forma PDO
     try{     
          $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //$conexion->exec("SET CHARACTER SET utf8");  //  NO FUNCIONA. HAY QUE UTILIZARLO COMO ABAJO
          $conexion->exec("SET NAMES utf8");
         
          // Abrimos y luego leemos el archivo ubidado en la carpeta destino y lo llevamos codificado a la variable contenido.
          $archivo_objetivo=fopen($carpeta_destino . $nombre_fichero, "r");  //Lo guardamos para solo lectura
          $contenido=fread($archivo_objetivo, $size_fichero);
          //$contenido=addslashes($contenido);     //addslashes escapea caracteres especiales tipo (/) NO FUNCIONA
          fclose($archivo_objetivo);

          //query
          $consulta="insert into ARCHIVOS (nombre, tipo, contenido) values (:nombre,:tipo,:contenido) ";
          $result=$conexion->prepare($consulta);
          $result->execute(array(":nombre"=> $nombre_fichero, ":tipo"=> $type_fichero, ":contenido"=> $contenido));
          echo "Numero de registros insertados: "  . $result->rowCount()  ; 
     }
     catch(Exception $e){
          echo "Error: ".$e->getMessage();
     }finally{
          $conexion=null;
     }    
 
?>