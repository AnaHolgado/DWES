<?php 
    session_start(); // Inicio de sesión
    $_SESSION['usuario'] = "root";
    $_SESSION['pass'] = "root";
?>
<!DOCTYPE html> 
<!--Ejercicio 4. Establece un control de acceso mediante nombre de usuario y 
contraseña para cualquiera de los programas de la relación anterior. La aplicación
no nos dejará continuar hasta que iniciemos sesión con un nombre de usuario y 
contraseña correctos.
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
                <h3>Ejercicio 4</h3>
                <p>Establece un control de acceso mediante nombre de usuario y 
contraseña para cualquiera de los programas de la relación anterior. La aplicación
no nos dejará continuar hasta que iniciemos sesión con un nombre de usuario y 
contraseña correctos.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Hasta 10000</p>
                <form  action = "#" method="get">
                    <label>Usuario: </label><input type="text" name="usuario"  autofocus>
                    <label>Contraseña: </label><input type="password" name="pass">
                    <br>
                    <input type="submit" value="Enviar" name="enviar">
                </form>
                <?php
                    if($_SESSION['usuario'] == $_GET['usuario'] && $_SESSION['pass'] == $_GET['pass']){
                        header('Location: ej3.php');
                    }
                ?>
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
