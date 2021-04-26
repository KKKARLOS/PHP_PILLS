<?php
     require_once("cbbdd.php");
     class Blog extends CBBDD {
          //Propiedades del objeto blog
          private $id;
          private $titulo;
          private $fecha;
          private $comentarios;
          private $foto;
          //Constructor  de la clase
          public function __construct() {
               parent::__construct();
          }
          public function __destruct() { 
               parent::__destruct();
          }          
          //Metocos de acceso y actualizacion (getter  y setter)
          public function get_Id(){
               return $this->id;
          }
          public function set_Id($id){
               $this->id=$id;
          }
          public function get_Titulo(){
               return $this->titulo;
          }
          public function set_Titulo($titulo){
               $this->titulo=$titulo;
          }
          public function get_Fecha(){
               return $this->fecha;
          }
          public function set_Fecha($fecha){
               $this->fecha=$fecha;
          }
          public function get_Comentarios(){
               return $this->comentarios;
          }
          public function set_Comentarios($comentarios){
               $this->comentarios=$comentarios;
          }
          public function get_Foto(){
               return $this->foto;
          }
          public function set_Foto($foto){
               $this->foto=$foto;
          }   
          
          public function getEntradas(){
               $matriz = array();
               //$contador=0;
               $resultado=$this->conexion->query("select * from blog_entradas order by fecha desc");
               while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $blog = new Blog();
                    $blog->set_Titulo($registro["titulo"]);
                    $blog->set_Fecha($registro["fecha"]);
                    $blog->set_Comentarios($registro["comentarios"]);
                    $blog->set_Foto($registro["foto"]);
                    $matriz[]=$blog;  //no hace falta utilizar variable contador pues va almacenando al final del array
               }
               return $matriz;
          }
          public function insertEntradas(Blog $blog){
               $sql = "insert into blog_entradas (titulo, fecha, comentarios, foto) values(:titulo, :fecha, :comentarios, :foto)";
               $result=$this->conexion->prepare($sql);
               $result->execute(array(":titulo"=> $blog->get_Titulo(), ":fecha"=> $blog->get_Fecha(), ":comentarios"=>  $blog->get_Comentarios(), ":foto"=>  $blog->get_Foto()));          
          }          
     }     
?>