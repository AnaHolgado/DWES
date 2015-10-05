<!DOCTYPE html> 
<!--Ejercicio 20. Realiza un programa que pinte una pirámide hueca por pantalla. 
La altura se debe pedir por teclado mediante un formulario. La pirámide estará 
hecha de bolitas, ladrillos o cualquier otra imagen de las 5 que se deben dar a 
elegir mediante un formulario.
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
                <h3>Ejercicio 20</h3>
                <p>Realiza un programa que pinte una pirámide hueca por pantalla. 
La altura se debe pedir por teclado mediante un formulario. La pirámide estará 
hecha de bolitas, ladrillos o cualquier otra imagen de las 5 que se deben dar a 
elegir mediante un formulario.</p>
            </article>
        <article>
            <h3>Ejercicio Resuelto</h3>
            <p>Indique qué imagen desea utilizar para la pirámide.</p>
            <form action="ej20.php" method="get"> 
                <label><img src="images/caca_n-672xXx80.jpg" alt=""/></label>
                <input type="radio" name="icono" value="images/caca_n-672xXx80.jpg" checked="checked">
                <label><img src="images/emoticono10-672xXx80-1.jpg" alt=""/></label>
                <input type="radio" name="icono" value="images/emoticono10-672xXx80-1.jpg">
                <label><img src="images/emoticono6-672xXx80.jpg" alt=""/></label>
                <input type="radio" name="icono" value="images/emoticono6-672xXx80.jpg">
                <label><img src="images/emoticono7-672xXx80.jpg" alt=""/></label>
                <input type="radio" name="icono" value="images/emoticono7-672xXx80.jpg">
                <label><img src="images/flamenca.jpg" alt=""/></label>
                <input type="radio" name="icono" value="images/flamenca.jpg"><br>
                <label>Número de filas</label><br>
                <input type="number" name="filas"><br>
                <input type="submit" value="Enviar" name="enviar"> 
            </form> 
        </article>
        <article>
            <h3>Solución</h3>
            <p>
            <?php
            $icono = $_GET['icono'];
            $filas = $_GET['filas'];
            if (isset($_REQUEST['enviar'])){
                $foto= '<img class="peque" src="'.$icono.'">';
                echo $foto."<br>";
                for ($i = 2; $i < $filas ; $i++){
                    echo $foto;
                    for ($j = 1; $j < ($i*2)-2 ; $j++){
                        echo '<img class="peque invisible" src="images/emoticono6-672xXx80.jpg">';
                    }
                    echo $foto;
                    echo "<br>";
                }
                for ($k = 0 ; $k < ($filas*2)-1; $k++){
                    echo $foto;
                }
            }
            ?>
            </p>
        </article>
        </section>
        <nav>
            <a href="ej16.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej23.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
