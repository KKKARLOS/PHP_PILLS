<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>

h1{
	text-align:center;
	color:#00F;
	border-bottom:dotted #0000FF;
	width:50%;
	margin:auto;
	
	
}

table{
	border:1px solid #F00;
	padding:20px 50px;
	margin-top:50px;
}

body{
	background-color:#FFC;
}


</style>
</head>

<body>
<h1>Registro de Artículos</h1>
<form name="form1" method="post" action="">
  <table border="0" align="center">
    <tr>
      <td>Código Artículo</td>
      <td><label for="c_art"></label>
      <input type="text" name="c_art" id="c_art"></td>
    </tr>
    <tr>
      <td>Sección</td>
      <td><label for="seccion"></label>
      <input type="text" name="seccion" id="seccion"></td>
    </tr>
    <tr>
      <td>Nombre artículo</td>
      <td><label for="n_art"></label>
      <input type="text" name="n_art" id="n_art"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="precio"></label>
      <input type="text" name="precio" id="precio"></td>
    </tr>
    <tr>
      <td>Fecha</td>
      <td><label for="fecha"></label>
      <input type="text" name="fecha" id="fecha"></td>
    </tr>
    <tr>
      <td>Importado</td>
      <td><label for="importado"></label>
      <input type="text" name="importado" id="importado"></td>
    </tr>
    <tr>
      <td>País de Origen</td>
      <td><label for="p_orig"></label>
      <input type="text" name="p_orig" id="p_orig"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
      <td align="center"><input type="submit" name="borrar" id="borrar" value="Borrar"></td>
    </tr>
  </table>
</form>
<?php
if (isset($_POST["enviar"])){
    //parametros de la conexion
    require("configConexion.php");
    //Recogida de parametros
    $codigo=$_POST["c_art"];
    $seccion=$_POST["seccion"];
    $nombre=$_POST["n_art"];
    $precio=$_POST["precio"];
    $fecha=$_POST["fecha"];
    $importado=$_POST["importado"];
    $paisorigen=$_POST["p_orig"];

    //conexion
    $conexion=mysqli_connect($db_host, $db_usuario, $db_pass, $db_nombre) or die("No se pudo conectar al servidor: ".mysqli_error());
    if (mysqli_connect_errno()){
        echo "Error de conexión al servidor";
        exit(); //Finalizar la ejecución de codigo pHp
    }
    mysqli_set_charset($conexion,"utf8");
    //query
    $consulta="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO,SECCIÓN,NOMBREARTÍCULO,PRECIO,FECHA,IMPORTADO,PAÍSDEORIGEN) VALUES ('$codigo','$seccion','$nombre','$precio','$fecha','$importado','$paisorigen')";
    //$consulta="INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO) VALUES ('$codigo','$seccion','$nombre')";
    //echo $consulta;

    $result=mysqli_query($conexion,$consulta);

    if (mysqli_affected_rows($conexion)>0) echo "Datos grabados correctamente";
    else echo "Error en grabación";

    // Cerrar la conexión
    mysqli_close($conexion);
}
if (isset($_POST["borrar"])){
  //parametros de la conexion
  require("configConexion.php");
  //Recogida de parametros
  $codigo=$_POST["c_art"];
  
  //conexion
  $conexion=mysqli_connect($db_host, $db_usuario, $db_pass, $db_nombre) or die("No se pudo conectar al servidor: ".mysqli_error());
  if (mysqli_connect_errno()){
      echo "Error de conexión al servidor";
      exit(); //Finalizar la ejecución de codigo pHp
  }
  mysqli_set_charset($conexion,"utf8");
  //query
  $consulta="DELETE FROM PRODUCTOS  WHERE CÓDIGOARTÍCULO='$codigo' ";
  // echo $consulta;

  $result=mysqli_query($conexion,$consulta);

  if ($result&&mysqli_affected_rows($conexion)>0) echo "Dato eliminado correctamente";
  else echo "Error en borrado";

  // Cerrar la conexión
  mysqli_close($conexion);
}
?>
</body>
</html>