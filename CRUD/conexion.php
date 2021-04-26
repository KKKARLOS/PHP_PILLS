<?php
     //parametros de la conexion
     //include("config.php");
     
     //conexion a base de datos  con la forma PDO
     //try{     
          $conexion=new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME,DB_USER,DB_PASS);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conexion->exec("SET CHARACTER SET utf8");
     /*
     }
     catch(Exception $e){
          echo "Error: ".$e->getMessage();
     }finally{
          $conexion=null;
     }   */
?>     