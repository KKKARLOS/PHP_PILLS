<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>    
     <?php
          $nombre="Juan";
          $edad=18;
          dameDatos();;
          print $nombre."</br>";
          echo $nombre," ",$edad."</br>";

         
          print "El nombre del usuario es ".$nombre."</br>";

          function dameDatos(){
               print "hola chicos </br>";
          }

          function dameNombre(){
               //Al declararse como global sabe que nos estamos refiendo a la variable de fuera de la función no a la definida
               //y que se llama igual (linea 1 Pepe)
               $nombre=" Pepe";
               global $nombre;
               $nombre="El nombre es ".$nombre;
          }   

          include ('otras_funciones.php');
          print "La suma de 4 + 5 son : ";
          print sumar(4,5);
          print "</br>";
          print "El nombre del usuario es $nombre</br>";
          print 'El nombre del usuario es $nombre'."</br>";

          // flujo de ejecucion
          dameDatos();
          dameNombre();
          echo $nombre;
          print "</br>";
          //Funciones matematicas  y Casting
          $num1=rand();
          echo " Aleatorio: $num1";
          print "</br>";
          $num1=rand(10,40);
          echo " Aleatorio entre 10 y 40: $num1";
          print "</br>";         
          $num1=pow(5,3);
          echo " 5 elevado a 3: $num1";
          print "</br>"; 
          $num1=round(5.8);
          echo " Redondeo 5.8: $num1";
          print "</br>";           
          $num1=round(5.878888888,2);
          echo " Redondeo 5.878888888: $num1";
          print "</br>";                
     ?>
</html>