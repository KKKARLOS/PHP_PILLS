<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<p>&nbsp;</p>
<!--<form name="form1" method="post" action="calculadora.php">-->
<form name="form1" method="post" action="">
  <p>
    <label for="num1"></label>
    <input type="text" name="num1" id="num1">
    <label for="num2"></label>
    <input type="text" name="num2" id="num2">
    <label for="operacion"></label>
    <select name="operacion" id="operacion">
      <option>Suma</option>
      <option>Resta</option>
      <option>Multiplicación</option>
      <option>División</option>
      <option>Módulo</option>
      <option>Incremento</option>
      <option>Decremento</option>
    </select>
  </p>
  <p>
    <input type="submit" name="enviando" id="enviando" value="Enviar" onClick="prueba">
  </p>
</form>
<p>&nbsp;</p>
<?php
  if (isset($_POST["enviando"])){
     $num1=$_POST["num1"];
     $num2=$_POST["num2"];
     $operacion=$_POST["operacion"];

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
      Case "Incremento": 
         $num1++;
          echo ("El resultado ". $num1);
            break;
      Case "Decremento": 
          $num1--;
          echo ("El resultado ". $num1);
            break;                      
    }
  }
?>
</body>
</html>