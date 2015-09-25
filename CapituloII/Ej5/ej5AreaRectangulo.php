<!DOCTYPE html>
<!--    Ejercicio 5 Escribe un programa que calcule el área de un rectángulo.

 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 5 </h1>
         <p>Área de un rectángulo</p>
         <?php 
            $base = $_GET['base'];
            $altura = $_GET['altura'];
            
            echo "El área del rectángulo es ".$base." x ".$altura." = ".$base*$altura;
            
         ?>
     </body> 
 </html>