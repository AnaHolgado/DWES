<?php 
    session_start();
    if (!isset($_COOKIE["palabras"])){
        $_SESSION['diccionario'] = array("gato" => "cat","perro" => "dog",
                        "raton" => "mouse","cerdo" => "pig","elefante" => "elephant",
                        "mofeta" => "skun","mapache" => "racoon","leon" => "lion",
                        "tigre" => "tiger","ballena" => "whale","delfin" => "dolphin",
                        "araña" => "spider","libelula" => "dragonfly","mariposa" => "butterfly",
                        "gusano" => "worm","conejo" => "rabbit","pez" => "fish",
                        "abeja" => "bee","tiburon" => "shark","camello" => "camel",);
        $palabras = serialize($_SESSION['diccionario']);
        setcookie("palabras", $palabras, time() + 3*24*3600); 
        header("Refresh:0");
    } else {
        $_SESSION['palabras'] = unserialize($_COOKIE["palabras"]);
    }
    if (isset($_POST["nuevo"])) { 
        $ingles = $_POST["ingles"]; 
        $espanol = $_POST["espanol"]; 
        $_SESSION['palabras'][$espanol] = $ingles;
        $palabras = serialize($_SESSION['palabras']);
        setcookie("palabras", $palabras, time() + 3*24*3600); 
    }  else  { 
        $palabras = $_COOKIE["palabras"]; 
        $_SESSION['palabras'] = unserialize($palabras);
        $diccionario = $_SESSION['palabras'];
    }
?>
<!DOCTYPE html> 
<!--Ejercicio 8. Realiza un programa que escoja al azar 5 palabras en inglés de 
un mini-diccionario. El programa pedirá que el usuario teclee la traducción al 
español de cada una de las palabras y comprobará si son correctas. Al final, el 
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La 
aplicación debe tener una opción para introducir los pares de palabras 
(inglés - español) que se deben guardar en cookies; de esta forma, si de vez en 
cuando se dan de alta nuevas palabras, la aplicación puede llegar a contar con 
un número considerable de entradas en el mini-diccionario.
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
                <h3>Ejercicio 8</h3>
                <p>Realiza un programa que escoja al azar 5 palabras en inglés de 
un mini-diccionario. El programa pedirá que el usuario teclee la traducción al 
español de cada una de las palabras y comprobará si son correctas. Al final, el 
programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas. La 
aplicación debe tener una opción para introducir los pares de palabras 
(inglés - español) que se deben guardar en cookies; de esta forma, si de vez en 
cuando se dan de alta nuevas palabras, la aplicación puede llegar a contar con 
un número considerable de entradas en el mini-diccionario.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Diccionario</p>
                <p>
                    
                <?php
                    
                    foreach ($diccionario as $clave => $valor) {
                        $palabrasDiccionario[] = $clave;
                    }
                    if(!isset($_REQUEST['enviar'])){
                        $_SESSION['indices']= array_rand($palabrasDiccionario, 5);
                        $indices = $_SESSION['indices'];
                        var_dump($_SESSION['indices']);
                        
                    } else{
                        $palabra0 = strtolower($_GET['palabra0']);
                        $palabra1 = strtolower($_GET['palabra1']);
                        $palabra2 = strtolower($_GET['palabra2']);
                        $palabra3 = strtolower($_GET['palabra3']);
                        $palabra4 = strtolower($_GET['palabra4']);
                    }
                ?>
                </p>
                <br>
                <?php
                if (!isset($_GET['enviar']) || isset($_GET['volver'])){
                ?>   
                
                <form action="#" method="get"> 
                   <label> <?php echo $indices[0]; ?></label><input type="text" name ="palabra0"autofocus><br>
                   <label> <?php echo $indices[1]; ?></label><input type="text" name ="palabra1"><br>
                   <label> <?php echo $indices[2]; ?></label><input type="text" name ="palabra2"><br>
                   <label> <?php echo $indices[3]; ?></label><input type="text" name ="palabra3"><br>
                   <label> <?php echo $indices[4]; ?></label><input type="text" name ="palabra4"><br>
                   <br>
                   <input type="submit" name="enviar" value ="Enviar"><br>
                </form>
                <?php
                }
                ?>
    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
             if(isset($_REQUEST['enviar'])){
                $indices = $_SESSION['indices'];
                $aciertos = 0;
                if($diccionario[$indices[0]] == $palabra0){
                    $aciertos++;
                } else {
                    echo $indices[0]. " es ".$diccionario[$indices[0]]."<br>";
                }
                if($diccionario[$indices[1]] == $palabra1){
                        $aciertos++;
                } else {
                    echo $indices[1]. " es ".$diccionario[$indices[1]]."<br>";
                }
                if($diccionario[$indices[2]] == $palabra2){
                        $aciertos++;
                    } else {
                    echo $indices[2]. " es ".$diccionario[$indices[2]]."<br>";
                }
                if($diccionario[$indices[3]] == $palabra3){
                        $aciertos++;
                    } else {
                    echo $indices[3]. " es ".$diccionario[$indices[3]]."<br>";
                }
                if($diccionario[$indices[4]] == $palabra4){
                        $aciertos++;
                    } else {
                    echo $indices[4]. " es ".$diccionario[$indices[4]]."<br>";
                }
               echo " Ha acertado ".$aciertos." preguntas.";
        ?>        
               <form action="#" method="post"> 
                   <label> Español </label><input type="text" name ="espanol"><br>
                   <label> Inglés</label><input type="text" name ="ingles"><br>
                   <br>
                   <input type="submit" name="nuevo" value ="Enviar"><br>
                </form>
                <form action="#" method="get">
                   <input type="submit" name="volver" value ="Volver"><br>
                </form>
        <?php
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
