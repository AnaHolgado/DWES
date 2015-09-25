<!DOCTYPE html>
<!--    Ejercicio 4. Escribe un programa que sume, reste, multiplique y divida 
dos números introducidos por teclado.
 -->
 <html> 
     <head> 
         <meta charset="UTF-8"> 
     </head> 
     
     <body> 
         <h1>Ejercicio 4 </h1>
         <p>Operaciones matemáticas</p>
         <?php 
            $numero1 = $_GET['n1'];
            $numero2 = $_GET['n2'];
            
            echo "Suma: ".$numero1." + ".$numero2." = ".($numero1+$numero2);
            echo "<br>Resta: ".$numero1." - ".$numero2." = ".($numero1-$numero2);
            echo "<br>Multiplicacion: ". $numero1." x ".$numero2." = ".$numero1*$numero2;
            echo "<br>Division: ". $numero1." / ".$numero2." = ".round($numero1/$numero2,2);
         ?>
     </body> 
 </html>