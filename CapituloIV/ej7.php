<!DOCTYPE html> 
<!--Ejercicio 7. Realiza el control de acceso a una caja fuerte. La combinación 
será un número de 4 cifras. El programa nos pedirá la combinación para abrirla. 
Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la combinación” 
y si acertamos se nos dirá “La caja fuerte se ha abierto satisfactoriamente”. 
Tendremos cuatro oportunidades para abrir la caja fuerte.

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
                <h3>Ejercicio 7</h3>
                <p>Realiza el control de acceso a una caja fuerte. La combinación 
                    será un número de 4 cifras. El programa nos pedirá la combinación 
                    para abrirla. Si no acertamos, se nos mostrará el mensaje 
                    “Lo siento, esa no es la combinación” y si acertamos se nos 
                    dirá “La caja fuerte se ha abierto satisfactoriamente”. 
                    Tendremos cuatro oportunidades para abrir la caja fuerte.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Caja Fuerte</p>
                <p>
                <?php
                    if (!isset($_REQUEST['enviar'])){
                            $intentos = 4;
                            $num1 = 0;
                            $num2 = 0;
                            $num3 = 0;
                            $num4 = 0;
                    }else {
                        $intentos = $_GET['intentos'];
                        $intentos = $intentos -1;
                        $num1 = $_GET['num1'];
                        $num2 = $_GET['num2'];
                        $num3 = $_GET['num3'];
                        $num4 = $_GET['num4'];
                    }
                ?>
                </p>
                <form  action = "ej7.php" method="get">
                    <input type="number" class="cifra" name="num1" value="<?=$num1?>" step="1" min="0" max="9" >
                    <input type="number" class="cifra" name="num2" value="<?=$num2?>" step="1" min="0" max="9" >
                    <input type="number" class="cifra" name="num3" value="<?=$num3?>" step="1" min="0" max="9" >
                    <input type="number" class="cifra" name="num4" value="<?=$num4?>" step="1" min="0" max="9" >
                    <input type="hidden" name="intentos" value="<?=$intentos?>">
                    <br>
                    <input type="submit" value="Enviar" name="enviar">
                </form>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            
            if(isset($_REQUEST['enviar'])){
                $a = 1;
                $b = 2;
                $c = 3;
                $d = 4;
                if($intentos > 0){
                    if ($a == $num1 && $b == $num2 && $c == $num3 && $d == $num4){
                        echo "CODIGO CORECTO <br>" , $a + " " , $b + " " , $c + " " , $d + " ";
                    } else{
                        echo "CODIGO INCORRECTO <br> Le quedan " , $intentos , " intentos";
                    }  
                } else {
                    echo "SE LE HAN ACABADO LOS INTENTOS";
                }
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
