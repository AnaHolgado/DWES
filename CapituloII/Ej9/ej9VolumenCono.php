<!DOCTYPE html>
<!--    Ejercicio 9. Escribe un programa que calcule el volumen de un cono 
mediante la fórmula V = 1 3πr2h.
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 9 </h1>
         <p>Volumen del Cono</p>
         <?php 
            $radio = $_GET['radio'];
            $altura = $_GET['altura'];
            echo "Volumen del cono es:".$radio." x ".$radio." x ".$altura." x PI / 3 = ".($radio*$radio*$altura* pi()/3);
            echo $horas." horas trabajadas en una semana son". ($horas*12)." euros";
         ?>
     </body> 
 </html>