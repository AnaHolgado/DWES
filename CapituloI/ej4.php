<!DOCTYPE html> 
<!-- Ejercicio 4. Escribe un programa que muestre tu horario de clase mediante 
una tabla. Aunque se puede hacer íntegramente en HTML (igual que los ejercicios 
anteriores), ve intercalando código HTML y PHP para familiarizarte con éste 
último -->


<html> 
    <head> 
        <meta charset="UTF-8"> 
    </head> 
    <body>
        
            <?php      
                echo "<table border='1'>";
                echo "<tr><th></th><th>LUNES</th><th>MARTES</th><th>MIERCOLES</th><th>JUEVES</th><th>VIERNES</th></tr>";
                echo "<tr><td>8:15 - 9:15</td><td rowspan='3'>ENTORNO SERVIDOR</td><td rowspan='3'>ENTORNO CLIENTE</td><td rowspan='3'>ENTORNO SERVIDOR</td><td rowspan='3'>ENTORNO CLIENTE</td><td rowspan='3'>INTERFACES</td></tr>";
                echo "<tr><td>9:15 - 10:15</td>";
                echo "<tr><td>10:15 - 11:15</td>";
                echo "<tr><td>11:415 - 12:45</td><td>EMPRESA</td><td rowspan='3'>DESPLIEGUE</td><td rowspan='3'>LIBRE CONFIGURACIÓN</td><td rowspan='3'>EMPRESA</td><td>INTERFACES</td></tr>";
                echo "<tr><td>12:45 - 13:45</td><td rowspan = '2'>INTERFACES</td><td rowspan = '2'>ENTORNO SERVIDOR</td></tr>";
                echo "<tr><td>13:45 - 14:45</td>";
                echo "</tr>";
                echo "</table>";
            ?>

    </body>
</html>
