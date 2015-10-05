<!DOCTYPE html> 
<!--Ejercicio 13. Escribe un programa que lea una lista de diez números y 
determine cuántos son positivos, y cuántos son negativos.
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
                <h3>Ejercicio 13</h3>
                <p>Escribe un programa que lea una lista de diez números y 
                determine cuántos son positivos, y cuántos son negativos.</p>
            </article>
            <article>
                <h3>Números Positivos y Negativos</h3>
                <?php
                    if (!isset($_REQUEST['enviar'])){
                            $positivos = 0;
                            $negativos = 0;
                            $contador = 0;
                    }else {
                        $positivos = $_GET['positivos'];
                        $negativos = $_GET['negativos'];
                        $contador = $_GET['contador'];
                        $contador++;
                        $numero = $_GET['numero'];
                        if($numero >= 0){
                            $positivos++;
                        }else {
                            $negativos++;
                        }
                    }
                ?>
                <form action="ej13.php" method="get"> 
                   <label>Numero:</label><input type="number" name="numero">
                   <input type="hidden" name="positivos" value="<?=$positivos?>">
                   <input type="hidden" name="negativos" value=<?=$negativos?>>
                   <input type="hidden" name="contador" value=<?=$contador?>>
                   <br>
                <?php   
                   if ($contador <10){
                   echo '<input type="submit" name="enviar" value ="Enviar">';
                   }
                ?>
                </form> 
            </article>
            <article>
                <h3>Solución</h3>
                <p>
                <?php
                    if ($contador == 10){
                        echo "Positivos: ".$positivos."<br>Negativos: ".$negativos;
                    }
                ?>
                </p>
        </article>
        </section>
        <nav>
            <a href="ej10.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej16.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
