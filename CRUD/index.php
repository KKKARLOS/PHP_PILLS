<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
<?php
    include("config.php");

    try{   
      include("conexion.php");
      $rowsPage=3;
      if (isset($_GET["pageActive"]))  $pageActive=$_GET["pageActive"];
      else $pageActive=1;
      $empezarDesde=($pageActive-1)*$rowsPage;

      $consulta="SELECT * from datos_usuarios";
      $result=$conexion->prepare($consulta);
      //$result->execute(array($busqueda));
      $result->execute(array());
      
      $totalRows=$result->rowCount();
      $totalPages=ceil($totalRows/$rowsPage);    //La función ceil nos redondea el resultado.

      echo "Numero de registros leídos: "  .  $totalRows . "</br>"; 
      echo "Mostramos $rowsPage  registros por página: </br>"; 
      echo "Mostrando la página $pageActive de  $totalPages </br>"; 

      $result->closeCursor();

      //$result=$conexion->query("SELECT * from datos_usuarios");
      //$arrayPersonas=$result->fetchAll(PDO::FETCH_OBJ);  //CREO UN ARRAY DE OBJETOS CON EL RESULTSET OBTENIDO EN LA CONSULTA
      //var_dump($arrayPersonas) ;
        //FORMA ABREVIADA A LAS INSTRUCCIONES ANTERIORES
        $arrayPersonas=$conexion->query("SELECT * from datos_usuarios LIMIT $empezarDesde, $rowsPage")->fetchAll(PDO::FETCH_OBJ); 

        if (isset($_POST["cr"])){
       
              //Recogida de parametros
          $nombre=$_POST["nombre"];
          $apellido=$_POST["apellido"];
          $direccion=$_POST["direccion"];

          $consulta="INSERT INTO datos_usuarios (nombre, apellido, direccion) values (:nombre, :apellido, :direccion)";
          //echo $consulta;
          // var_dump($conexion);
          $result=$conexion->prepare($consulta);
          $result->execute(array(":nombre"=>$nombre,":apellido"=>$apellido,":direccion"=>$direccion));
          echo "Numero de registros insertados: "  . $result->rowCount() ; 
          $archivoActual = $_SERVER['PHP_SELF'];
          header("Location:index.php");
        }
    }
    catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }finally{
        $conexion=null;
    }  
?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   <?php 
      foreach( $arrayPersonas as $persona ) { ?>
      <tr>
      <td><?php echo $persona->id ?> </td>
      <td><?php echo $persona->nombre ?></td>
      <td><?php echo $persona->apellido ?></td>
      <td><?php echo $persona->direccion ?></td>
 
      <td class="bot"><input type='button' onclick='location.href="borrar.php?id=<?php echo $persona->id ?>"'  name='del' id='del' value='Borrar'></td>
      <td class='bot'>
        <a href="editar.php?id=<?php echo $persona->id ?>&nombre='<?php echo$persona->nombre ?>' &apellido='<?php echo$persona->apellido ?>'&direccion='<?php echo$persona->direccion?>'  ">
        <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>
   <?php } ?>
    
	<tr>
	<td></td>
      <td><input type='text' name='nombre' id='nombre' size='10' class='centrado'></td>
      <td><input type='text' name='apellido' id='apellido' size='10' class='centrado'></td>
      <td><input type='text' name=' direccion' id='direccion' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>
<p>&nbsp;</p>   
<div style="margin:auto;text-align:center">
<?php 
//------------------------------------------------------------------------Paginación------------------------------------------------------------------
echo "Mostrando la página $pageActive de  $totalPages&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; "; 

for($i=1;$i<=$totalPages;$i++){
     echo  "<a href='index.php?pageActive=" .$i . " ' > " .$i  ."<a/>  ";
}
?>
</form>
 </div>
</body>
</html>