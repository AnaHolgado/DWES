<?php 
    session_start(); // Inicio de sesión
    $usuario = $_SESSION['usuario'];
    if(isset($_REQUEST['enviar'])) { 
        $_SESSION['suma'] += $_GET['numero'];
        $_SESSION['contador']++;
    } else { 
        $_SESSION['contador'] = 0; 
        $_SESSION['suma'] = 0; 
    }
?>
<!DOCTYPE html> 
<!--Ejercicio 3. Escribe un programa que permita ir introduciendo una serie 
indeterminada de números mientras su suma no supere el valor 10000. Cuando esto 
último ocurra, se debe mostrar el total acumulado, el contador de los números 
introducidos y la media. Utiliza sesiones
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
                <h3>Ejercicio 3</h3>
                <?php
                    echo "usuario: ".$_SESSION['usuario'];
                ?>
                <p>Escribe un programa que permita ir introduciendo una serie 
indeterminada de números mientras su suma no supere el valor 10000. Cuando esto 
último ocurra, se debe mostrar el total acumulado, el contador de los números 
introducidos y la media. Utiliza sesiones</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Hasta 10000</p>
                <p>
                <?php
                    if (!isset($_REQUEST['enviar']) || $_SESSION['suma'] <= 10000){
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
            if ($_SESSION['suma'] > 10000) {
                echo "<p>Suma: ". $_SESSION['suma']."</p>";
                echo "<p>Cantidad de números: ".$_SESSION['contador']."</p>";
                echo "<p>Media: ". $_SESSION['suma']/$_SESSION['contador']."</p>";
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
