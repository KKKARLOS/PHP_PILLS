<?php
     //parametros de la conexion
     require("conexionBBDD_clase_POO_PDO.php");
     class busquedaProductos extends Conexion{

          public function busquedaProductos(){
               parent::__construct();  //Ejecución el constructor de la clase padre (Conexion)
          }
          
          public function getProductos($pais){
               $consulta="SELECT CÓDIGOARTÍCULO,  NOMBREARTÍCULO, SECCIÓN, PRECIO, FECHA , IMPORTADO, PAÍSDEORIGEN from productos where  PAÍSDEORIGEN = '" .$pais ."' ";
               echo $consulta;
               $result=$this->conexion_db->prepare($consulta);
               $result->execute(array());
               $resultado=$result->fetchAll(PDO::FETCH_ASSOC);
               $result->closeCursor();
               return $resultado;
          }
     }     
?>