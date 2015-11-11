<?php 
    if (isset($_POST["enviar"])) { 
        $color = $_POST["color"]; 
        setcookie("fondoColor", $color, time() + 3*24*3600); 
    }  else  { 
        $color = $_COOKIE["fondoColor"]; 
    }
?>
<!DOCTYPE html> 
<!--Ejercicio 7. Escribe un programa que guarde en una cookie el color de fondo
(propiedad background-color)de una página. Esta página debe tener únicamente algo 
de texto y un formulario para cambiar el color.
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo VI</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            body {
                <?php
                echo "background-color:".$color.";";
                ?>
            }
        </style>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO VI </a></h2>
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
                <h3>Ejercicio 7</h3>
                <p>Escribe un programa que guarde en una cookie el color de fondo
(propiedad background-color)de una página. Esta página debe tener únicamente algo 
de texto y un formulario para cambiar el color.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Cambio de Background</p>
                <p>
                <form action ="#" method="POST">
                    <label>Color</label><input type ="color" name ="color"><br>
                    <input type="submit" name ="enviar" value = "ENVIAR">
                </form>
                </p>
            </article>
            
        </section>
        <nav>
            <a href="index.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej10.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
