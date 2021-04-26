<?php
      require_once("models/conexion.php");
      $conexion=Conectar::conexion();
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

      /*echo "Numero de registros leídos: "  .  $totalRows . "</br>"; 
      echo "Mostramos $rowsPage  registros por página: </br>"; 
      echo "Mostrando la página $pageActive de  $totalPages </br>"; */

      $result->closeCursor();
?>