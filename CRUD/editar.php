<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value=<?php echo $_GET["id"]; ?>></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nombre" id="nombre" value=<?php echo $_GET["nombre"] ?>></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="apellido" id="apellido" value=<?php echo $_GET["apellido"]; ?>></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="direccion" id="direccion" value= <?php echo $_GET["direccion"]; ?>></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<?php
if (isset($_GET["bot_actualizar"])){

    //Recogida de parametros
    $id=$_GET["id"];
    $nombre=$_GET["nombre"];
    $apellido=$_GET["apellido"];
    $direccion=$_GET["direccion"];

    //conexion a base de datos  con la forma PDO
    try{     
      //parametros de la conexion
      include("config.php");
      include ("conexion.php");
      //query
      $consulta="UPDATE datos_usuarios SET nombre = :nombre, apellido = :apellido, direccion = :direccion WHERE id = :id";
      //echo $consulta;
      $result=$conexion->prepare($consulta);
      $result->execute(array(":nombre"=>$nombre,":apellido"=>$apellido,":direccion"=>$direccion,":id"=>$id));
      echo "Numero de registros modificados: "  . $result->rowCount() ; 
      header("Location:index.php");
    }
    catch(Exception $e){
      echo "Error: ".$e->getMessage();
    }finally{
      $conexion=null;
    }    
}
?>
<p>&nbsp;</p>
</body>
</html>