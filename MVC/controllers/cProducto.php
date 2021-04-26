<?php
    require_once("models/mProducto.php");
    $producto = new Producto();
    $aProductos =$producto->getProductos();
    require_once("views/vProducto.php");
?>