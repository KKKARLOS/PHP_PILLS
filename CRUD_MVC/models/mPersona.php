<?php
     //parametros de la conexion
     require_once("models/conexion.php");
     class Persona {
          private $db;
          private $aPersonas;

          public function __construct(){
               $this->db=Conectar::Conexion();  //Los metodos y variables estáticos van con ::
               $this->aPersonas=array();
          }
          /*public function busquedaProductos(){
               parent::__construct();  //Ejecución el constructor de la clase padre (Conexion)
          }*/
          public function getPersonas(){
               require("models/paginacion.php");
               //echo " Desde:  $empezarDesde Hasta:  $rowsPage";
               /*$consulta = $this->db->query("SELECT * FROM PRODUCTOS");
               $this->aProductos=$consulta->fetchAll(PDO::FETCH_OBJ); 
               return $this->aProductos;*/
               //Otra forma : La utilizada en el video
               $consulta = $this->db->query("SELECT * FROM datos_usuarios LIMIT $empezarDesde, $rowsPage ");
               while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                    $this->aPersonas[]=$fila;
               }
               return $this->aPersonas;
          }

          public function deletePersonas($id){
               //$id = $_GET["id"];
               $this->db->query("delete from datos_usuarios where id=$id");
               //header("Location:index.php");
          }
     }     
?>