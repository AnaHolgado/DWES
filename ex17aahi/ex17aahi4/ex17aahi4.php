<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 
<!--Ejercicio 4. Crea un array bidimensional de 10 filas por 9 columnas relleno 
con números aleatorios entre 1 y 1000 (ambos incluidos). Los números se pueden 
repetir. Se deben mostrar todos los números bien alineados en filas y columnas. 
Muestra el máximo de entre los números capicúa en azul y los números adyacentes 
en verde. Si el máximo capicúa se repite, se puede colorear uno cualquiera de 
ellos o todos, como al alumno le resulte más fácil.
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - t1c1a</title>  
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>EXAMEN T1C1A</h1>
            <h2><a href= "index.php">ARRAYS </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="../ex17aahi1/ex17aahi1.php">Ejercicio 1</a></li>
                    <li><a href="../ex17aahi2/ex17aahi2.php">Ejercicio 2</a></li>
                    <li><a href="../ex17aahi3/ex17aahi3.php">Ejercicio 3</a></li>
                    <li><a href="../ex17aahi4/ex17aahi4.php">Ejercicio 4</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 4</h3>
                <p>Crea un array bidimensional de 10 filas por 9 columnas relleno 
con números aleatorios entre 1 y 1000 (ambos incluidos). Los números se pueden 
repetir. Se deben mostrar todos los números bien alineados en filas y columnas. 
Muestra el máximo de entre los números capicúa en azul y los números adyacentes 
en verde. Si el máximo capicúa se repite, se puede colorear uno cualquiera de 
ellos o todos, como al alumno le resulte más fácil.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Matriz Original</p>
                <p>
                <?php
                $capicuoMax = -222;
                $posI = -1;
                $posJ = -1;
                for ($i = 0; $i < 10 ; $i++){
                    for ($j = 0; $j < 9; $j++){
                        $matrizOriginal[$i][$j] = rand(1,1000);
                        //Compobar si es capicuo el número.
                        if($matrizOriginal[$i][$j] > 10){
                            $numRev = strrev($matrizOriginal[$i][$j]);
                            if($matrizOriginal[$i][$j] == $numRev && $matrizOriginal[$i][$j] > $capicuoMax){
                                $capicuoMax = $matrizOriginal[$i][$j];
                                $posI = $i;
                                $posJ = $j;
                            }
                        }
                    }
                }
                echo "</p>";
                //Impirmir la matriz original
                echo "<table><tr><th></th><th>1</th><th>2</th><th>3</th><th>4</th>"
                . "<th>5</th><th>6</th><th>7</th><th>8</th><th>9</th></tr>";
                for ($i = 0; $i < 10 ; $i++){
                    echo "<tr><th>".($i+1)."</th>";
                        for ($j = 0; $j < 9; $j++){
                            echo "<td";
                            if($i == $posI & $j == $posJ){
                                echo " class='blue' ";
                            }else if ($i == $posI+1 && $j == $posJ+1 || $i == $posI+1 && $j == $posJ-1 ||
                                    $i == $posI+1 && $j == $posJ || $i == $posI-1 && $j == $posJ+1 || $i == $posI-1 && $j == $posJ-1 ||
                                    $i == $posI-1 && $j == $posJ || $i == $posI && $j == $posJ+1 || $i == $posI && $j == $posJ-1){
                                echo " class='green' ";
                            }
                            
                            
                            echo ">".$matrizOriginal[$i][$j]."</td>";
                        }
                    echo "</tr>";
                }
                echo "</table>";
                ?>
    </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>