<!DOCTYPE html> 
<!--Ejercicio 10. Escribe un programa que calcule la media de un conjunto de 
números positivos introducidos por teclado. A priori, el programa no sabe cuántos 
números se introducirán. El usuario indicará que ha terminado de introducir los 
datos cuando meta un número negativo.
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
                <h3>Ejercicio 10</h3>
                <p> Escribe un programa que calcule la media de un conjunto de 
                    números positivos introducidos por teclado. A priori, el 
                    programa no sabe cuántos números se introducirán. El usuario 
                    indicará que ha terminado de introducir los datos cuando meta 
                    un número negativo.
                </p>
            </article>
            <article>
                <h3>Media</h3>
                <p>Introduzca los números</p>
                <p>
                <?php
                if (!isset($_REQUEST['enviar'])){
                            $numeros = 0;
                            $suma = 0;
                    }else {
                        $numeros = $_GET['numeros'];
                        $numeros++;
                        $num = $_GET['num'];
                        $suma = $_GET['suma'];
                        $suma += $num;
                    }
                ?>
                </p>
                <form action = "ej10.php" method="get">
                    <input type="number" name="num" step="1" >
                    <input type="hidden" name="numeros" value="<?=$numeros?>">
                    <input type="hidden" name="suma" value=<?=$suma?>>
                    <br>
                <?php
                    if($num >= 0){
                        echo '<input type="submit" value="Enviar" name="enviar">';
                    }
                ?>
                </form>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            if(isset($_REQUEST['enviar'])){
                if ($num < 0){
                    echo "La media es ".(($suma-$num)/($numeros-1));
                }
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej7.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej13.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
