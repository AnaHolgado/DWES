<!DOCTYPE html> 
<!--Ejercicio 12. Realiza un programa que escoja al azar 5 palabras en español 
del mini-diccionario del ejercicio anterior. El programa pedirá que el usuario 
teclee la traducción al inglés de cada una de las palabras y comprobará si son 
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas 
y cuántas erróneas.
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
                <h3>Ejercicio 12</h3>
                <p>Realiza un programa que escoja al azar 5 palabras en español 
del mini-diccionario del ejercicio anterior. El programa pedirá que el usuario 
teclee la traducción al inglés de cada una de las palabras y comprobará si son 
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas 
y cuántas erróneas.
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
                        foreach ($diccionario as $clave => $valor) {
                            $palabrasDiccionario[] = $clave;
                        }
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                        for ($i = 0; $i < 5 ; $i++){
                            $indices[$i]= $palabrasDiccionario[rand(0,19)];
                        }
                    } else{
                        $contador = $_GET['contador'];
                        $palabra0 = strtolower($_GET['palabra0']);
                        $palabra1 = strtolower($_GET['palabra1']);
                        $palabra2 = strtolower($_GET['palabra2']);
                        $palabra3 = strtolower($_GET['palabra3']);
                        $palabra4 = strtolower($_GET['palabra4']);
                        $indices = $_GET['indices'];
                       
                        $indices = unserialize($indices);
                        
                        $contador++;
                    }
                ?>
                </p>
                <br>
                <?php
                if (!isset($_GET['enviar'])){
                ?>   
                
                <form action="#" method="get"> 
                   <label> <?php echo $indices[0]; ?></label><input type="text" name ="palabra0"autofocus><br>
                   <label> <?php echo $indices[1]; ?></label><input type="text" name ="palabra1"><br>
                   <label> <?php echo $indices[2]; ?></label><input type="text" name ="palabra2"><br>
                   <label> <?php echo $indices[3]; ?></label><input type="text" name ="palabra3"><br>
                   <label> <?php echo $indices[4]; ?></label><input type="text" name ="palabra4"><br>
                   <br>
                   <input type="hidden" name ="contador" value=<?=$contador?>>
                   <input type="hidden" name ="indices" value=<?= serialize($indices)?>>
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
