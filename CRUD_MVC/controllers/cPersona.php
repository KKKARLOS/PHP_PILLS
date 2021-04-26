<?php
    require_once("models/mPersona.php");

    $persona = new Persona();
    $aPersonas =$persona->getPersonas();
    
    require_once("views/vPersona.php");
?>