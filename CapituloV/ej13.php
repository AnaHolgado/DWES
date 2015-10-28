<!DOCTYPE html> 
<!--Ejercicio 13. Rellena un array bidimensional de 6 filas por 9 columnas con 
números enteros positivos comprendidos entre 100 y 999 (ambos incluidos). Todos 
los números deben ser distintos, es decir, no se puede repetir ninguno. Muestra 
a continuación por pantalla el contenido del array de tal forma que se cumplan 
los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde. 
• El mínimo debe aparecer en color azul. 
• El resto de números debe aparecer en color negro.
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo V</title>  
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= "index.php">CAPITULO V </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="ej1.php">Ejercicio 1</a></li>
                    <li><a href="ej2.php">Ejercicio 2</a></li>
                    <li><a href="ej3.php">Ejercicio 3</a></li>
                    <li><a href="ej4.php">Ejercicio 4</a></li>
                    <li><a href="ej5.php">Ejercicio 5</a></li>
                    <li><a href="ej6.php">Ejercicio 6</a></li>
                    <li><a href="ej7.php">Ejercicio 7</a></li>
                    <li><a href="ej8.php">Ejercicio 8</a></li>
                    <li><a href="ej9.php">Ejercicio 9</a></li>
                    <li><a href="ej10.php">Ejercicio 10</a></li>
                    <li><a href="ej11.php">Ejercicio 11</a></li>
                    <li><a href="ej12.php">Ejercicio 12</a></li>
                    <li><a href="ej13.php">Ejercicio 13</a></li>
                    <li><a href="ej14.php">Ejercicio 14</a></li>
                    <li><a href="ej15.php">Ejercicio 15</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 13</h3>
                <p>Rellena un array bidimensional de 6 filas por 9 columnas con 
números enteros positivos comprendidos entre 100 y 999 (ambos incluidos). Todos 
los números deben ser distintos, es decir, no se puede repetir ninguno. Muestra 
a continuación por pantalla el contenido del array de tal forma que se cumplan 
los siguientes requisitos:
<br>• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde. 
<br>• El mínimo debe aparecer en color azul. 
<br>• El resto de números debe aparecer en color negro.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Array de 6 x 9</p>
                <p>
                    
                <?php
                $minimo = 999;
                    for ($i = 0; $i < 6; $i++){
                        for ($j = 0; $j < 9 ; $j++){
                            do{
                                $existe = false;
                                $numero = rand(100,999);
                                for ($k = 0; $k <=$i ; $k++){
                                    for ($l = 0 ; $l < $j ; $l++){
                                        if($arrayBidi[$k][$l]== $numero){
                                          $existe = true; 
                                        }
                                    }
                                }
                            }while($existe);
                            if ($minimo > $numero){
                                $minimo = $numero;
                                $minimoX = $i;
                                $minimoY =$j;
                            }
                            $arrayBidi[$i][$j] = $numero;                      
                            
                        }
                    }
                ?>
                </p>
                <br>
                
    </article>
    <article>
        <h3>Resultado</h3>
        <table id="eje13">
        <?php
            for ($i = 0; $i <6; $i++){
                echo "<tr>";
                for ($j = 0; $j < 9 ; $j++){
                    if($minimoX == $i && $minimoY == $j){
                       echo "<td class='blue'>".$arrayBidi[$i][$j]."</td>";   
                    }else if (abs($i-$minimoX) == abs($j-$minimoY)){
                        echo "<td class='green'>".$arrayBidi[$i][$j]."</td>";
                    } else {
                        echo "<td>".$arrayBidi[$i][$j]."</td>";      
                    }
                }
                echo "</tr>";
            }
        ?>
        </table>
        </article>
        </section>
        <nav>
            <a href="ej10.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej12.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
