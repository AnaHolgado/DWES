<!DOCTYPE html>
<!--    Ejercicio 10. Realiza un conversor de Mb a Kb.

 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 10 </h1>
         <p>Conversor de Mb a kb</p>
         <?php 
            $Mb = $_GET['Mb'];
            echo $Mb." Mb son ".($Mb*1024)." kb.";
         ?>
     </body> 
 </html>