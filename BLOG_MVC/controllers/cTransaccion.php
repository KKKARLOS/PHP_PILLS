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
          if (isset($_FILES["imagen"]["name"]) && ($_FILES["imagen"]["error"]==UPLOAD_ERR_OK) )
          {
               //ruta de la carpeta destino en servidor
               $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/PHP_PILLS/BLOG/uploads/";
               echo $carpeta_destino;
               $nombre_imagen=$_FILES["imagen"]["name"];

               //Movemos la imagen del directorio temporal (origen) a la carpeta destino
               move_uploaded_file($_FILES['imagen']["tmp_name"],$carpeta_destino . $nombre_imagen);
               echo "El archivo " . $nombre_imagen . "se ha copiado correctamente en el directorio uploads";

               //parametros de la conexion
               //require_once("../models/configConexion.php");

               //Modelos
               require_once("../models/cbbdd.php");
               //require_once("../models/mUtilidades.php");

               require_once("../models/mblog.php");

                //Recogida de parametros
               $titulo=$_POST["titulo"];
               $fecha=date("Y-m-d H:i:s");
               $comentarios=$_POST["comentarios"];
                

               //conexion a base de datos  con la forma PDO
               try{     
                        
                         $blog=new Blog();
                         //htmlentities y addslashes para evitar injeccion sql
                         $blog->set_Titulo(htmlentities(addslashes($titulo),ENT_QUOTES));
                         $blog->set_Fecha($fecha);
                         $blog->set_Comentarios(htmlentities(addslashes($comentarios),ENT_QUOTES));
                         $blog->set_Foto($nombre_imagen);
                         
  /*                       $utilidades = new Utilidades($conexion);
                         $utilidades->insertEntradas($blog);*/
                         $blog->insertEntradas($blog);
                         echo "Entrada de blog agregada correctamente";
                    }
                    catch(Exception $e){
                         echo "Error: ".$e->getMessage();
                    }finally{
                         $blog=null;
                    }    
          }
          else{
               echo "Error. El archivo " . $nombre_imagen . "no se ha copiado correctamente en el directorio uploads";
          }
     }
?>
</body>
</html>
