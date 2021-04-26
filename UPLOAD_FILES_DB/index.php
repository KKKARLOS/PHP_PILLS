<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          .container{
               width:100%;
               margin:auto;
               text-align:center;
               padding:50px 50px;
          }
          input{
               padding:20px 20px;
          }
     </style>
</head>
<body>
<form action="upload_fichero.php" method="post" enctype="multipart/form-data">
     <div class="container">
          <label for="fichero">Fichero: </label><input type="file" name="fichero" >
          <br/> <br/>
          <input type="submit" value="ENVIAR">
     </div>
</form>
</body>
</html>