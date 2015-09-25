<!DOCTYPE html>
<!--    Ejercicio 3. Realiza un conversor de pesetas a euros. 
La cantidad en pesetas que se quiere convertir se deberá introducir por teclado
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 3 </h1>
         <p>Conversor de Pesetas a Euros</p>
         <?php 
            $pesetas = $_GET['pesetas'];
            echo $pesetas." pesetas = ". round($pesetas/166.67,2)." euros";
         ?>
     </body> 
 </html>