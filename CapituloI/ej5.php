<!DOCTYPE html> 
<!-- Ejercicio 5. Escribe un programa que utilice las variables $x y $y. 
Asignales los valores 144 y 999 respectivamente. A continuación, muestra por 
pantalla el valor de cada variable, la suma, la resta, la división y la 
multiplicación. 
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
    </head> 
    <body>
        
            <?php      
                $x = 144;
                $y = 999;
                echo "variable x = $x <br> variable y = $y <br> suma =", $x+$y, "<br> resta =", $x-$y,"<br> multiplicación = ", $x*$y,"<br> división = ", $y/$x;
            ?>

    </body>
</html>
