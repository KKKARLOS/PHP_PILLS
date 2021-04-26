<?php
     //parametros de la conexion
     require_once("models/config.php");
     class Conectar{
          public static function Conexion(){
               try{                             
                    $conexion_db = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME,DB_USER,DB_PASS);
                    $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conexion_db->exec("SET CHARACTER SET " . DB_CHARSET);
   /*                 $conexion_db = new PDO("mysql:host=localhost; dbname=pruebakarlos","root","");
                    $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conexion_db->exec("SET CHARACTER SET utf8");*/
               }
               catch(Exception $e){
                    echo "Error: ".$e->getMessage();
                    echo "Error en la línea: " .$e->getLine();
               }
               return $conexion_db ;
          }
     }     
?>