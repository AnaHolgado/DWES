<!DOCTYPE html> 
<!-- Ejercicio 3. Escribe un programa que muestre 
por pantalla 10 palabras en inglés junto a su 
correspondiente traducción al castellano. Las
palabras deben estar distribuidas en dos columnas.
Utiliza la etiqueta <table> de HTML. -->


<html> 
    <head> 
        <meta charset="UTF-8"> 
    </head> 
    <body>
        
            <?php      
                echo "<table>";
                echo "<tr><td>DOG</td><td>PERRO</td></tr>";
                echo "<tr><td>CAT</td><td>GATO</td></tr>";
                echo "<tr><td>MOUSE</td><td>RATÓN</td></tr>";
                echo "<tr><td>DUCK</td><td>PATO</td></tr>";
                echo "<tr><td>SKUN</td><td>MOFETA</td></tr>";
                echo "<tr><td>RACOON</td><td>MAPACHE</td></tr>";
                echo "<tr><td>FROG</td><td>RANA</td></tr>";
                echo "<tr><td>FISH</td><td>PEZ</td></tr>";
                echo "<tr><td>SNAKE</td><td>SERPIENTE</td></tr>";
                echo "<tr><td>COW</td><td>VACA</td></tr>";
                echo "</table>"
            ?>

    </body>
</html>
