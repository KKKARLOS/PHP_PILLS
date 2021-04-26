<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php

	include("Concesionario.php");
	
	//Compra_vehiculo::$ayuda=10000;
	Compra_vehiculo::descuento();
	//Primera instancia  de la clase (otro objeto)
	
	$compra_Antonio=new Compra_vehiculo("compacto");
	
	$compra_Antonio->climatizador();
	
	$compra_Antonio->tapiceria_cuero("blanco");
	
	echo "El precio final del coche elegido por Antonio es " .$compra_Antonio->precio_final() . "<br>";
	
	//Segunda instancia  de la clase (otro objeto)

	$compra_Ana=new Compra_vehiculo("compacto");
	
	$compra_Ana->climatizador();
	
	$compra_Ana->tapiceria_cuero("rojo");
	
	echo "El precio final del coche elegido por Ana es " .$compra_Ana->precio_final() . "<br>"
	
	
	
	


?>
</body>
</html>