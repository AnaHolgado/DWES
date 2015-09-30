<!DOCTYPE html> 
<!--Ejercicio 9. Realiza un programa que resuelva una ecuación de segundo grado 
(del tipo ax2 + bx + c = 0).
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo III</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO III </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="../Ej2/index.php">Ejercicio 2</a></li>
                    <li><a href="../Ej9/index.php">Ejercicio 9</a></li>
                    <li><a href="../Ej10/index.php">Ejercicio 10</a></li>
                    <li><a href="../Ej11/index.php">Ejercicio 11</a></li>
                    <li><a href="../Ej12/index.php">Ejercicio 12</a></li>
                    <li><a href="../Ej13/index.php">Ejercicio 13</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 9</h3>
                <p>Realiza un programa que pida una hora por teclado y que muestre 
luego buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los 
tramos de 6 a 12, de 13 a 20 y de 21 a 5. respectivamente.Sólo se tienen en cuenta
las horas, los minutos no se deben introducir por teclado. </p>
            </article>
        <article>
            <h3>Ejercicio Resuelto</h3>
            <p>Ecuación de segundo grado</p>
            <p>ax² + bx + c = 0</p>
            <p>Introduzca los coeficientes para saber los valores de la x.</p>
            <form action="index.php" method="get"> 
                <label>a</label><input type="number" step="0.01" name="a"><br> 
                <label>b</label><input type="number" step="0.01" name="b"><br> 
                <label>c</label><input type="number" step="0.01" name="c"><br> 
                <input type="submit" value="Enviar" name="enviar"> 
            </form> 
        </article>
        <article>
            <h3>Solución</h3>
            <p>
            <?php
            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            $enviar = $_GET['enviar'];

            if ($enviar){
                if (!$a && !$b && !$c){
                    echo"x = Infinito";
                } else if ($a == 0){
                    echo "Es una ecuación de primer grado.<br>x = ".(-$c/$b);
                } else if ($c == 0){
                    echo "x1 = 0 <br> x2 = ".(-$c/$b);
                } else if ($b*$b-4*$a*$c >= 0){
                    echo "x1 = ".((-$b+sqrt($b*$b-4*$a*$c))/(2*$a));
                    echo "<br>x2 = ".((-$b-sqrt($b*$b-4*$a*$c))/(2*$a));
                } else {
                    echo "El resultado es irreal.";
                }

            }
            ?>
            </p>
        </article>
        </section>
        <nav>
            <a href="../Ej2/index.php" id="anterior">Anterior</a>
            <a href="../index.php" id="home">Home</a>
            <a href="../Ej10/index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
