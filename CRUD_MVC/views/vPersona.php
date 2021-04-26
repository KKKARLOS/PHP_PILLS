<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<?php
     require("models/paginacion.php");
?>
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
    foreach( $aPersonas as $persona ) { ?>
    <tr>
    <td><?php echo $persona["id"] ?> </td>
    <td><?php echo $persona["nombre"]  ?></td>
    <td><?php echo $persona["apellido"]  ?></td>
    <td><?php echo $persona["direccion"]  ?></td>

    <td class="bot"><input type='button' onclick='location.href="borrar.php?id=<?php echo $persona["id"]?>"'  name='del' id='del' value='Borrar'></td>
    <td class='bot'>
      <a href="editar.php?id=<?php echo $persona['id']?>&nombre='<?php echo $persona['nombre']  ?>' &apellido='<?php echo $persona['apellido'] ?>'&direccion='<?php echo $persona['direccion']?>'  ">
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
</body>
</html>