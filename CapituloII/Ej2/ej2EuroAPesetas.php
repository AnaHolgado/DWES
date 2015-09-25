<!DOCTYPE html>
<!--    Ejercicio 2. Realiza un conversor de euros a pesetas. Ahora la cantidad 
        en euros que se quiere convertir se deberá introducir por teclado.
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 2 </h1>
         <p>Conversor de Euros a Pesetas</p>
         <?php 
            $euro = $_GET['euro'];
            echo $euro." euros = ". round($euro*166.67,0)." pesetas";
         ?>
     </body> 
 </html>