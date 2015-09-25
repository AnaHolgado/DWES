<!DOCTYPE html>
<!--    Ejercicio 1. Realiza un programa que pida dos números y luego muestre el 
        resultado de su multiplicación.
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 1 </h1>
         <p>Resultado de la multiplicaión</p>
         <?php 
            $numero1 = $_GET['n1'];
            $numero2 = $_GET['n2'];
            echo $numero1." x ".$numero2." = ".$numero1*$numero2;
         ?>
     </body> 
 </html>