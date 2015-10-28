<!DOCTYPE html> 
<!--Ejercicio 4. Escribe un programa que genere 100 números aleatorios del 0 al 
20 y que los muestre por pantalla separados por espacios. El programa pedirá 
entonces por teclado dos valores y a continuación cambiará todas las ocurrencias 
del primer valor por el segundo en la lista generada anteriormente. Los números 
que se han cambiado deben aparecer resaltados de un color diferente.

-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo V</title>  
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= "index.php">CAPITULO V </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="ej1.php">Ejercicio 1</a></li>
                    <li><a href="ej2.php">Ejercicio 2</a></li>
                    <li><a href="ej3.php">Ejercicio 3</a></li>
                    <li><a href="ej4.php">Ejercicio 4</a></li>
                    <li><a href="ej5.php">Ejercicio 5</a></li>
                    <li><a href="ej6.php">Ejercicio 6</a></li>
                    <li><a href="ej7.php">Ejercicio 7</a></li>
                    <li><a href="ej8.php">Ejercicio 8</a></li>
                    <li><a href="ej9.php">Ejercicio 9</a></li>
                    <li><a href="ej10.php">Ejercicio 10</a></li>
                    <li><a href="ej11.php">Ejercicio 11</a></li>
                    <li><a href="ej12.php">Ejercicio 12</a></li>
                    <li><a href="ej13.php">Ejercicio 13</a></li>
                    <li><a href="ej14.php">Ejercicio 14</a></li>
                    <li><a href="ej15.php">Ejercicio 15</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 4</h3>
                <p>Escribe un programa que genere 100 números aleatorios del 0 al 
20 y que los muestre por pantalla separados por espacios. El programa pedirá 
entonces por teclado dos valores y a continuación cambiará todas las ocurrencias 
del primer valor por el segundo en la lista generada anteriormente. Los números 
que se han cambiado deben aparecer resaltados de un color diferente.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> 100 números aleatorios.</p>
                <p>
                <?php
                    if(!isset($_REQUEST['enviar'])){
                        for($i = 0 ; $i < 100 ; $i++){
                            $n[$i] = rand(0 , 20);
                        }  
                        foreach ($n as $numero) {
                            echo $numero. " ";
                        }
                    } else{
                        $numeroOriginal = $_GET['numeroOriginal'];
                        $numeroNuevo = $_GET['numeroNuevo'];
                        $n = $_GET['arrayNum'];
                        $n = unserialize($n);
                        foreach ($n as $numero){
                            echo $numero. " ";
                        }
                    }
                    
                ?>
                </p>
                <br>
                <form action="#" method="get"> 
                   <label>Numero Original:</label><input type="text" name="numeroOriginal" autofocus>
                   <br><label>Numero Nuevo:</label><input type="text" name="numeroNuevo">
                   <input type="hidden" name="arrayNum" value=<?= serialize($n)?>>
                   <br>
                   <input type="submit" name="enviar" value ="Enviar">
                </form>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            if ( isset($_REQUEST['enviar'])){
                foreach ($n as $numero){
                    if ($numero == $numeroOriginal){
                        $numero = $numeroNuevo;
                        echo "<span> ". $numero. " </span>";
                    } else {
                        echo $numero. " ";
                    }
                }
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej3.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej5.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
