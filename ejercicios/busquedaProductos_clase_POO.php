<?php
     //parametros de la conexion
     require("conexionBBDD_clase_POO.php");
     class busquedaProductos extends Conexion{

          public function busquedaProductos(){
               parent::__construct();  //Ejecución el constructor de la clase padre (Conexion)
          }
          public function getProductos(){
               $resultado = $this->conexion_db->query("SELECT * FROM PRODUCTOS");
               return $resultado->fetch_all(MYSQLI_ASSOC);
          }
     }     
?>