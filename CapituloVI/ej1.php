<?php 
    session_start(); // Inicio de sesión
    if(isset($_REQUEST['enviar'])) { 
        if ($_GET['numero'] >= 0){
            $_SESSION['contador']++; 
            $_SESSION['suma'] += $_GET['numero'];
        }
    } else { 
        $_SESSION['contador'] = 0; 
    }
?>
<!DOCTYPE html> 
<!--Ejercicio 1. Escribe un programa que calcule la media de un conjunto de 
números positivos introducidos por teclado. A priori, el programa no sabe 
cuántos números se introducirán. El usuario indicará que ha terminado de 
introducir los datos cuando meta un número negativo. Utiliza sesiones.
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo VI</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
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
                <h3>Ejercicio 1</h3>
                <p>Escribe un programa que calcule la media de un conjunto de 
números positivos introducidos por teclado. A priori, el programa no sabe 
cuántos números se introducirán. El usuario indicará que ha terminado de 
introducir los datos cuando meta un número negativo. Utiliza sesiones.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Media</p>
                <?php
                    if (!isset($_REQUEST['enviar']) || $_GET['numero'] > 0){
                ?>
                <form  action = "#" method="get">
                    <label>Número</label><input type="number" name="numero" step="1" autofocus>
                    <br>
                    <input type="submit" value="Enviar" name="enviar">
                </form>
                <?php
                    } 
                ?>
    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            if ($_GET['numero'] < 0) {
                echo "<p>Media: ". $_SESSION['suma']/$_SESSION['contador'];
            }
        ?>
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
