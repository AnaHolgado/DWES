<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 
<!--Ejercicio 3.  En ajedrez, el valor de las piezas se mide en peones según la 
siguiente tabla: Pieza Dama Torre Alfil Caballo Peón Valor 9 peones 5 peones 3 
peones 2 peones 1 peón Realiza un programa que vaya generando al azar las piezas 
que capturan dos jugadores durante una partida. Un jugador se rinde cuando el 
contrario captura el equivalente a 9 peones (o más). 
Ejemplo: Fichas capturadas: 
Alfil negro (3 peones) Caballo blanco (2 peones) Peón blanco (1 peones) 
Torre negro (5 peones) Alfil negro (3 peones) 
Las negras se rinden, han perdido el equivalente a 11 peones. Hay que tener en 
cuenta que cada jugador tiene la posibilidad de capturar algunas de las siguientes 
piezas (no más): 1 dama, 2 torres, 2 alfiles, 2 caballos y 8 peones. El valor de 
cada pieza se debe almacenar en un array asociativo.
 
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - t1c1a</title>  
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>EXAMEN T1C1A</h1>
            <h2><a href= "index.php">ARRAYS </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="../ex17aahi1/ex17aahi1.php">Ejercicio 1</a></li>
                    <li><a href="../ex17aahi2/ex17aahi2.php">Ejercicio 2</a></li>
                    <li><a href="../ex17aahi3/ex17aahi3.php">Ejercicio 3</a></li>
                    <li><a href="../ex17aahi4/ex17aahi4.php">Ejercicio 4</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 3</h3>
                <p>En ajedrez, el valor de las piezas se mide en peones según la 
siguiente tabla: Pieza Dama Torre Alfil Caballo Peón Valor 9 peones 5 peones 3 
peones 2 peones 1 peón Realiza un programa que vaya generando al azar las piezas 
que capturan dos jugadores durante una partida. Un jugador se rinde cuando el 
contrario captura el equivalente a 9 peones (o más). 
Ejemplo: Fichas capturadas: 
Alfil negro (3 peones) Caballo blanco (2 peones) Peón blanco (1 peones) 
Torre negro (5 peones) Alfil negro (3 peones) 
Las negras se rinden, han perdido el equivalente a 11 peones. Hay que tener en 
cuenta que cada jugador tiene la posibilidad de capturar algunas de las siguientes 
piezas (no más): 1 dama, 2 torres, 2 alfiles, 2 caballos y 8 peones. El valor de 
cada pieza se debe almacenar en un array asociativo.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Figuras capturadas</p>
                <p>
                    
                <?php
                    $puntos = array ("dama" => 9,"torre" => 5,  "alfil" => 3,"caballo" => 2,
                        "peon" => 1);
                    $color = array ("blanco","negro");
                    $figuras = array ("dama", "alfil",  "alfil","torre","torre","caballo",
                        "caballo", "peon", "peon", "peon","peon","peon","peon","peon","peon",);
                    $i = 0;
                    $puntuacionBlancas = 0;
                    $puntuacionNegras = 0;
                    
                    do{
                        $existe = false;
                        $pieza = rand(0, 14);
                        $colorNuevo = $color[rand (0,1)];
                        for ($j = 0 ; $j < $i ; $j++){
                            if (($arrayJugada[$j]['pieza']== $pieza) && ($arrayJugada[$j]['color']== $colorNuevo)){
                                $existe = true;
                            } 
                        }
                        if (!$existe) {
                            $arrayJugada[$i]['pieza'] = $pieza;
                            $arrayJugada[$i]['color'] = $colorNuevo;
                            
                            echo $figuras[$arrayJugada[$i]['pieza']]." de ".$arrayJugada[$i]['color']."( Puntos: ".$puntos[$figuras[$arrayJugada[$i]['pieza']]].")<br>";
                            if($colorNuevo == "blanco"){
                                $puntuacionBlancas += $puntos[$figuras[$arrayJugada[$i]['pieza']]]; 
                            } else {
                                $puntuacionNegras += $puntos[$figuras[$arrayJugada[$i]['pieza']]]; 
                            }
                        }    
                    }while($puntuacionBlancas < 9 && $puntuacionNegras < 9);
                    
                ?>
                </p>
                
                

    </article>
    <article>
        <h3>Resultado</h3>
        <?php
            if ($puntuacionBlancas > $puntuacionNegras){
                        echo "<p>Las blancas se rinden, han perdido el equivalente a ". $puntuacionBlancas." peones.</p>";
                    } else {
                        echo "<p>Las negras se rinden, han perdido el equivalente a ". $puntuacionNegras." peones.</p>";
                    }
        ?>
   
        </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
