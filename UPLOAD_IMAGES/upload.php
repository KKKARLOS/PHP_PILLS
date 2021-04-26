<?php
     $nombre_imagen=$_FILES["imagen"]["name"];
     $type_imagen=$_FILES["imagen"]["type"];
     $size_imagen=$_FILES["imagen"]["size"];
     //Limitamos la subida de archivos a un tamaño menor a 2 megas
     echo " Tamaño de la imagen " . $size_imagen . "</br>";
     if ($size_imagen>2000000){
          echo "El tamaño de la imagen excede el límite permitido de 2 megas";
          exit();
     } 
     echo " Tipo de la imagen " . $type_imagen . "</br>";
     if  (!($type_imagen=="image/jpeg" || $type_imagen=="image/jpg" || $type_imagen=="image/png" || $type_imagen=="image/gif" )){
          echo "El tipo de archivo no es de tipo imagen jpeg,jpg,png,gif";
          exit();
     } 
     //ruta de la carpeta destino en servidor
     $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/PHP_PILLS/upload_images/uploads/";
     echo $carpeta_destino;

     //Movemos la imagen del directorio temporal (origen) a la carpeta destino
     move_uploaded_file($_FILES['imagen']["tmp_name"],$carpeta_destino . $nombre_imagen);

     //Registrar en base de datos (la ruta de la carpeta en donde se encuentra la imagen)

     //parametros de la conexion
     require("configConexion.php");

     //conexion a base de datos  con la forma PDO
     try{     
          $conexion=new PDO("mysql:host=$db_host; dbname=$db_nombre", $db_usuario, $db_pass);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conexion->exec("SET CHARACTER SET utf8");
          //query
          $consulta="UPDATE PRODUCTOS SET FOTO = :foto WHERE CÓDIGOARTÍCULO='AR01' ";
          //echo $consulta;
          $result=$conexion->prepare($consulta);
          $result->execute(array(":foto"=> $nombre_imagen));
          echo "Numero de registros modificados: "  . $result->rowCount()  ; 
     }
     catch(Exception $e){
          echo "Error: ".$e->getMessage();
     }finally{
          $conexion=null;
     }    
 
?>