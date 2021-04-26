 <?php
     //parametros de la conexion
     require("config.php");
     class Conexion{
          protected $conexion_db;
          public function Conexion(){
               $this->conexion_db=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
               
               if ($this->conexion_db->connect_errno) {
                    echo "Falló la conexión: " .$this->conexion_db->connect_error;
                    return;
               }
               $this->conexion_db->set_charset(DB_CHARSET);
          }
     }     
?>