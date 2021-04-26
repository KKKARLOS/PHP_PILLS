<?php
     //parametros de la conexion
     require_once("models/conexion.php");
     class Producto {
          private $db;
          private $aProductos;

          public function __construct(){
               $this->db=Conectar::Conexion();  //Los metodos y variables estáticos van con ::
               $this->aProductos=array();
          }
          /*public function busquedaProductos(){
               parent::__construct();  //Ejecución el constructor de la clase padre (Conexion)
          }*/
          public function getProductos(){
               /*$consulta = $this->db->query("SELECT * FROM PRODUCTOS");
               $this->aProductos=$consulta->fetchAll(PDO::FETCH_OBJ); 
               return $this->aProductos;*/
               //Otra forma : La utilizada en el video
               $consulta = $this->db->query("SELECT * FROM PRODUCTOS");
               while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                    $this->aProductos[]=$fila;
               }
               return $this->aProductos;
          }
     }     
?>