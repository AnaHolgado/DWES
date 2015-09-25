<!DOCTYPE html>
<!--    Ejercicio 6. Escribe un programa que calcule el área de un triángulo.


 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 6 </h1>
         <p>Área de un triángulo</p>
         <?php 
            $base = $_GET['base'];
            $altura = $_GET['altura'];
            
            echo "El área del rectángulo es ".$base." x ".$altura." / 2 = ".($base*$altura/2);
            
         ?>
     </body> 
 </html>