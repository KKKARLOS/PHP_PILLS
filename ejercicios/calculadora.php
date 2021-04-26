<?php
if (isset($_POST["enviando"])){
     $num1=$_POST["num1"];
     $num2=$_POST["num2"];
     $operacion=$_POST["operacion"];
     calcular($operacion,$num1,$num2);
}
function calcular($operacion,$num1,$num2){
     switch($operacion){
          Case "Suma": 
          echo ("El resultado ".($num1+$num2));
            break;
          Case "Resta": 
            echo ("El resultado ".($num1-$num2));
              break;
          Case "Multiplicación": 
            echo ("El resultado ".($num1*$num2));
              break;
          Case "División": 
            echo ("El resultado ".($num1/$num2));
              break;
              Case "Módulo": 
            echo ("El resultado ".($num1%$num2));
              break;
        }
}
?>