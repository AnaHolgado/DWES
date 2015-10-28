<!DOCTYPE html> 
<!--Ejercicio 11. Crea un mini-diccionario español-inglés que contenga, al menos, 
20 palabras (con su traducción). Utiliza un array asociativo para almacenar las 
parejas de palabras. El programa pedirá una palabra en español y dará la 
correspondiente traducción en inglés.
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
                <h3>Ejercicio 11</h3>
                <p>Crea un mini-diccionario español-inglés que contenga, al menos, 
20 palabras (con su traducción). Utiliza un array asociativo para almacenar las 
parejas de palabras. El programa pedirá una palabra en español y dará la 
correspondiente traducción en inglés.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Diccionario</p>
                <p>
                    
                <?php
                    $diccionario = array("gato" => "cat","perro" => "dog",
                        "raton" => "mouse","cerdo" => "pig","elefante" => "elephant",
                        "mofeta" => "skun","racoon" => "mapache","leon" => "lion",
                        "tigre" => "tiger","ballena" => "whale","delfin" => "dolphin",
                        "araña" => "spider","libelula" => "dragonfly","mariposa" => "butterfly",
                        "gusano" => "worm","conejo" => "rabbit","pez" => "fish",
                        "abeja" => "bee","tiburon" => "shark","camello" => "camel",);
                    $palabra = $_GET['palabra'];
                    
                ?>
                </p>
                <br>
                <form action="#" method="get"> 
                   <input type="text" name ="palabra" autofocus>
                   <br>
                   <input type="submit" name="enviar" value ="Enviar"><br>;
                </form>
    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
             if(isset($_REQUEST['enviar'])){
                $diccionario["gato"];
                echo "Palabra: ".$palabra." Traducción: ". $diccionario[$palabra];
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej10.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej12.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
