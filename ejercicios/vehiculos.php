<?php
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     class Coche{
          protected $ruedas;    //con private encapsulamos el atributo ruedas para que no se pueda modicar desde fuera de la clase. Sólo es modificable desde la propia clase.
                                             //con protected las clases hijas pueden compartir  el atributo
          protected $color;
          protected $motor;

          //Metodo Constructor. El constructor de una clase va a indicar el estado inicial de los objetos que pertenezcan a esta clase
          function Coche(){
               $this->ruedas=4;
               $this->color="";
               $this->motor=1600;
          }
          function arrancar(){
               echo "estoy arrancando<br>";
          }
          function girar(){
               echo "estoy girando<br>";
          }
          function frenar(){
               echo "estoy frenando<br>";
          }
          function establerColor($color_coche,$nombre_coche){
               $this->color=$color_coche;
               echo "El color de $nombre_coche es $color_coche <br>";
          }
          //funcion getter
          function getRuedas(){
               return $this->ruedas;
          }
          function getMotor(){
               return $this->motor;
          }          
     }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     class Camion extends Coche{

          //Metodo Constructor. El constructor de una clase va a indicar el estado inicial de los objetos que pertenezcan a esta clase
          function Camion(){
               $this->ruedas=8;
               $this->color="gris";
               $this->motor=3600;
          }        
          function establerColor($color_camion,$nombre_camion){
               $this->color=$color_camion;
               echo "El color de $nombre_camion es $color_camion <br>";
          }
          //Podría cuando sobreescribo un metodo de la clase padre ejecutarrlo desde el metodo de la clase hija
          function arrancar(){
               parent::arrancar();  //ejecucion del metodo de la clase padre
               echo "camion arrancando<br>";
          }       
     }
?>