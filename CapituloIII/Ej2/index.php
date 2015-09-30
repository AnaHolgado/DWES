<!DOCTYPE html> 
<!--Ejercicio 2. Realiza un programa que pida una hora por teclado y que muestre 
luego buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los 
tramos de 6 a 12, de 13 a 20 y de 21 a 5. respectivamente.Sólo se tienen en cuenta
las horas, los minutos no se deben introducir por teclado -->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo III</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
			<!--<a href="index.php">IMAGEN HEADER</a>-->
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO III </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="../Ej2/index.php">Ejercicio 2</a></li>
                    <li><a href="../Ej9/index.php">Ejercicio 9</a></li>
                    <li><a href="../Ej10/index.php">Ejercicio 10</a></li>
                    <li><a href="../Ej11/index.php">Ejercicio 11</a></li>
                    <li><a href="../Ej12/index.php">Ejercicio 12</a></li>
                    <li><a href="../Ej13/index.php">Ejercicio 13</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 2</h3>
                <p>Realiza un programa que pida una hora por teclado y que muestre 
luego buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los 
tramos de 6 a 12, de 13 a 20 y de 21 a 5. respectivamente.Sólo se tienen en cuenta
las horas, los minutos no se deben introducir por teclado. </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Introduzca una hora para que pueda saludarle. </p>
                <form action="index.php" method="get"> 
                    Hora :<input type="number" min="0" max= "23" name="hora"><br> 
                    <input type="submit" value="Enviar"> 
                </form> 
            </article>
            <article>
                <h3>Saludo</h3>
                <?php 
                    echo "<p>";
                    $hora = $_GET['hora'];
                    if ($hora ){
                        if ($hora >= 6 && $hora <12){
                            echo "¡Buenos Dias!";
                        }
                        else if ($hora >= 12 && $hora <20){
                            echo "¡Buenos Tardes!";
                        }else {
                            echo "¡Buenos Noches!";
                        }
                        echo " Son las ".$hora.":00.";
                    }
                    echo "</p>";
                 ?>
            </article>
        </section>
        <nav>
            <a href="../index.php" id="anterior">Anterior</a>
            <a href="../index.php" id="home">Home</a>
            <a href="../Ej9/index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>