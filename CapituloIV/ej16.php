<!DOCTYPE html> 
<!--Ejercicio 16. Escribe un programa que diga si un número introducido por 
teclado es o no primo. Un número primo es aquel que sólo es divisible entre él 
mismo y la unidad -->

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
			<!--<a href="index.php">IMAGEN HEADER</a>-->
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO IV </a></h2>
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
                <h3>Ejercicio 16</h3>
                <p>Escribe un programa que diga si un número introducido por 
teclado es o no primo. Un número primo es aquel que sólo es divisible entre él 
mismo y la unidad </p>
            </article>
            <article>
                <h3>¿El número es Primo?</h3>
                <p>Introduzca un número </p>
                <form action="ej16.php" method="get"> 
                    <input type="number" name="numero"><br> 
                    <input type="submit" value="Enviar"> 
                </form> 
            </article>
            <article>
                <h3>Solución</h3>
                <?php 
                    echo "<p>";
                    $numero = $_GET['numero'];
                    for ($i = 2; $i < $numero; $i++){
                        if($numero%$i == 0){
                            echo "El ".$numero." no es Primo";
                            $i = $numero;
                        }
                    }
                    if ($i == $numero){
                        echo "El ".$numero." es Primo";
                    }
                    echo "</p>";
                ?>
            </article>
        </section>
        <nav>
            <a href="ej13.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej20.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>