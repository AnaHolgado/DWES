<!DOCTYPE html>
<!--    Ejercicio 11. Realiza un conversor de Kb a Mb.

 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 11 </h1>
         <p>Conversor de kb a Mb</p>
         <?php 
            $kb = $_GET['kb'];
            echo $kb." kb son ". number_format(($kb/1024),2)." Mb.";
         ?>
     </body> 
 </html>