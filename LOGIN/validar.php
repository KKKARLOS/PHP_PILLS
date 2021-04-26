<?php
require("config.php");
try{     

     $conexion=new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME,DB_USER,DB_PASS);
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conexion->exec("SET CHARACTER SET utf8");
     $consulta="select * from usuarios_pass where  USUARIO = :usuario AND PASSWORD = :password";

     $result=$conexion->prepare($consulta);
     $usuario =  htmlentities(addslashes($_POST["usuario"]));
     $password =  htmlentities(addslashes($_POST["password"]));

     $result->bindValue(":usuario",$usuario);
     $result->bindValue(":password",$password);
     $result->execute();
     $num_registros = $result->rowCount();

     if ($num_registros!=0){
          session_start();
          $_SESSION["usuario"]=$_POST["usuario"];
          header("location:usuarios_registrados.php");
     }
     else header("location:index.php");
}
catch(Exception $e){
     echo "Error: ".$e->getMessage();
     echo "Error en la línea: " .$e->getLine();
}finally{
     $conexion=null;
}    

?>