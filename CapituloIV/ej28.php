<!DOCTYPE html> 
<!--Ejercicio 28. Escribe un programa que calcule el factorial de un número 
entero leído por teclado.

-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo IV</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO IV</a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="ej7.php">Ejercicio 7</a></li>
                    <li><a href="ej10.php">Ejercicio 10</a></li>
                    <li><a href="ej13.php">Ejercicio 13</a></li>
                    <li><a href="ej16.php">Ejercicio 16</a></li>
                    <li><a href="ej20.php">Ejercicio 20</a></li>
                    <li><a href="ej23.php">Ejercicio 23</a></li>
                    <li><a href="ej28.php">Ejercicio 28</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 28</h3>
                <p>Escribe un programa que calcule el factorial de un número 
entero leído por teclado. </p>
            </article>
        <article>
            <h3>Ejercicio Resuelto</h3>
            <p>Factorial</p>
            <p>Introduzca un número entero para calcularle su factorial.</p>
            <form action="ej28.php" method="get"> 
                <input type="number" step="1" name="numero"><br> 
                <input type="submit" value="Enviar" name="enviar"> 
            </form> 
        </article>
        <article>
            <h3>Solución</h3>
            <p>
            <?php
            $numero = $_GET['numero'];
            $factorial = 1;
            if (isset($_REQUEST['enviar'])){
                for ($i = 1 ; $i <= $numero; $i++){
                    $factorial = $factorial * $i;
                }
                echo "El factorial de ".$numero. " es ".$factorial;
            }
            ?>
            </p>
        </article>
        </section>
        <nav>
            <a href="ej23.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
