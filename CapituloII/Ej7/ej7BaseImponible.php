<!DOCTYPE html>
<!--    Ejercicio 7. Escribe un programa que calcule el total de una factura a 
partir de la base imponible


 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 7 </h1>
         <p>Total de la factura</p>
         <?php 
            $base = $_GET['base'];
            echo "Factura ".$base." + 21% I.V.A= ".  number_format(($base*1.21),2)." euros.";
         ?>
     </body> 
 </html>