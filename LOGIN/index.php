<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="width: 600px; margin: 0 auto; border-style: double; margin-top:50px; padding: 30px">
     <h2>Introduce tus datos</h2>
	<form style="margin-top:40px;" method="POST" action="validar.php">
		<h3>Usuario:</h3>
		<input type="email" id="usuario" name="usuario" size="40"/>

		<h3>Password:</h3>
		<input type="password" id="password" name="password" size="40"/>
		<p style="text-align:center;margin-top:50px"><input type="submit" value="Validar"/></p>
     </form>
     
	<?php
		if (isset($_GET["msg"])) {
			echo "<h2>".$_GET["msg"]."</h2>";
		}
	?>
</body>
</html>