<!DOCTYPE html> 
<!--Ejercicio 23. Escribe un programa que permita ir introduciendo una serie indeterminada 
de números hasta que la suma de el los supere el valor 10000. Cuando esto último ocurra,
se debe mostrar el total acumulado, el contador de los números introducidos y la media.
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
                <h3>Ejercicio 23</h3>
                <p>Escribe un programa que permita ir introduciendo una serie indeterminada 
de números hasta que la suma de ellos supere el valor 10000. Cuando esto último ocurra,
se debe mostrar el total acumulado, el contador de los números introducidos y la media. </p>
            </article>
        <article>
            <h3>Ejercicio Resuelto</h3>
            <p>Introduzca números enteros hasta 1000.</p>
            <?php
                if (!isset($_REQUEST['enviar'])){
                            $suma = 0;
                            $contador = 0;
                    }else {
                        $suma = $_GET['suma'];
                        $contador = $_GET['contador'];
                        $contador++;
                        $numero = $_GET['numero'];
                        $suma += $numero;
                    }
                ?>
            <form action="ej23.php" method="get"> 
                <input type="number" step="1" name="numero"><br> 
                <input type="hidden" name="suma" value=<?=$suma?>>
                <input type="hidden" name="contador" value=<?=$contador?>>
                <?php
                if($suma < 10000){
                echo '<input type="submit" value="Enviar" name="enviar"> ';
                } ?>
            </form> 
        </article>
        <article>
            <h3>Solución</h3>
            <p>
            <?php
            if($suma >= 10000){
                echo "Suma: ".$suma."<br>Numeros: ".$contador."<br>Media: ".($suma/$contador);
            }
            ?>
            </p>
        </article>
        </section>
        <nav>
            <a href="ej20.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej28.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
