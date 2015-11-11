<?php 
    session_start(); // Inicio de sesión
    if(isset($_REQUEST['enviar'])) { 
        if ($_GET['numero'] >= 0){
            if ($_GET['numero']%2 == 0 && $_GET['numero'] > $_SESSION['mayorPar']){
                $_SESSION['mayorPar'] = $_GET['numero'];
            }
            if ($_GET['numero']%2 != 0){
                $_SESSION['contadorImpar']++; 
                $_SESSION['sumaImpar'] += $_GET['numero'];
            }
        }
    } else { 
        $_SESSION['contadorImpar'] = 0; 
        $_SESSION['sumaImpar'] = 0; 
        $_SESSION['mayorPar'] = 0;
    }
?>
<!DOCTYPE html> 
<!--Ejercicio 2. Realiza un programa que vaya pidiendo números hasta que se 
introduzca un numero negativo y nos diga cuantos números se han introducido, la 
media de los impares y el mayor de los pares. El número negativo sólo se utiliza 
para indicar el final de la introducción de datos pero no se incluye en el 
cómputo. Utiliza sesiones.
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
                <h3>Ejercicio 2</h3>
                <p>Realiza un programa que vaya pidiendo números hasta que se 
introduzca un numero negativo y nos diga cuantos números se han introducido, la 
media de los impares y el mayor de los pares. El número negativo sólo se utiliza 
para indicar el final de la introducción de datos pero no se incluye en el 
cómputo. Utiliza sesiones.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Media Impares y Mayor de los Pares</p>
                <p>
                <?php
                    if (!isset($_REQUEST['enviar']) || $_GET['numero'] > 0){
                ?>
                </p>
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
                echo "<p>Media Impares: ". $_SESSION['sumaImpar']/$_SESSION['contadorImpar']."</p>";
                echo "<p>Mayor Par: ".$_SESSION['mayorPar']."</p>";
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
