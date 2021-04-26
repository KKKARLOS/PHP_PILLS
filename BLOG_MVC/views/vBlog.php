<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          .contenedor{
               width:80%;
               margin:auto;
               text-align:center;
          }
     </style>
     </head>
     <body>
     <?php
          require_once("../models/mBlog.php");          
          try{                 
               $blog = new Blog();
               $aBlog=$blog->getEntradas();

               if (empty($aBlog)){
                    echo "No hay entradas del blog";
               }else{
                    echo "<div class='contenedor'>";
                    echo "<h1>BLOG</h1>";
                    echo "<hr>";
                    foreach($aBlog as $blog){
                         $titulo=$blog->get_Titulo();
                         $fecha=$blog->get_Fecha();
                         $comentarios=$blog->get_Comentarios();
                         $foto=$blog->get_Foto();
     
                         echo "<h3>$titulo</h3>";
                         echo "<h4>$fecha</h4>";
                         echo "<div style='width:400px; margin:auto; text-align:center'>$comentarios</div><br><br>";
                         if ($foto!="") 
                              echo "<img src='/PHP_PILLS/blog_mvc/uploads/" . $foto ."' width='700px'  height='700px' alt=' '>";
                         echo "<hr>";                        
                    }
               }
          }
          catch(Exception $e){
               echo "Error: ".$e->getMessage();
          }finally{
               $blog=null;
          }    
          echo "<br><br>";
          echo "<a href='ventradas.php'>Crear entrada para el blog</a>";          
     ?>     


</body>
</html>