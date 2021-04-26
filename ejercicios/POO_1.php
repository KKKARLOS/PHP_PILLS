<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     include("vehiculos.php");

     $renault = new Coche();
     $mazda = new Coche();
     $seat = new Coche();

     $mazda->girar();
     //echo "El mazda tiene  $mazda->ruedas ruedas.<br>";
     echo "El Mazda tiene " . $mazda->getRuedas() . " ruedas.<br>";
     $renault->establerColor("Rojo","Renault");

     $pegaso=new Camion();
     echo "El pegaso tiene " .$pegaso->getRuedas() . " ruedas.<br>";
     $pegaso->arrancar();
     $pegaso->frenar();
     $pegaso->establerColor("Rojo","Renault");
     echo "El Mazzda tiene " .$mazda->getRuedas() . " ruedas.<br>";
     echo "El Mazzda tiene un motor de " .$mazda->getMotor() . " centrimetros cubicos.<br>";
     echo "El Pegaso tiene un motor de " .$pegaso->getMotor() . " centrimetros cubicos.<br>";
?>
</body>
</html>