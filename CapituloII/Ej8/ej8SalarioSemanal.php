<!DOCTYPE html>
<!--    Ejercicio 8. Escribe un programa que calcule el salario semanal de un 
trabajador en base a las horas trabajadas. Se pagarán 12 euros por hora.
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 8 </h1>
         <p>Horas Semanales</p>
         <?php 
            $horas = $_GET['horas'];
            echo "La hora de un trabajador son 12 euros.<br>";
            echo $horas." horas trabajadas en una semana son". ($horas*12)." euros";
         ?>
     </body> 
 </html>