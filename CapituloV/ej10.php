<!DOCTYPE html> 
<!--Ejercicio 10. Realiza un programa que escoja al azar 10 cartas de la baraja 
española y que diga cuántos puntos suman según el juego de la brisca. Emplea un 
array asociativo para obtener los puntos a partir del nombre de la figura de la 
carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras 
cogido de una baraja de verdad.
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
                <h3>Ejercicio 10</h3>
                <p>Realiza un programa que escoja al azar 10 cartas de la baraja 
española y que diga cuántos puntos suman según el juego de la brisca. Emplea un 
array asociativo para obtener los puntos a partir del nombre de la figura de la 
carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras 
cogido de una baraja de verdad.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Brisca</p>
                <p>
                    
                <?php
                    $puntos = array ("as" => 11,"dos" => 0,  "tres" => 10,"cuatro" => 0,
                        "cinco" => 0,"seis" => 0,"siete" => 0, "sota" => 2 , "caballo" =>3, "rey" => 4);
                    $palo = array ("copas","oros","espadas","bastos");
                    $figuras = array ("as", "dos",  "tres","cuatro","cinco","seis",
                        "siete", "sota", "caballo", "rey");
                    $i = 0;
                    $puntuacion = 0;
                    
                    do{
                        $existe = false;
                        $numero = rand(0, 9);
                        $paloNuevo = $palo[rand (0,3)];
                        for ($j = 0 ; $j < $i ; $j++){
                            if (($arrayBaraja[$j]['numero']== $figuras[$numero]) && ($arrayBaraja[$j]['palo']== $paloNuevo)){
                                $existe = true;
                                echo "Copia";
                            } 
                        }
                        if (!$existe) {
                            $arrayBaraja[$i]['numero'] = $figuras[$numero];
                            $arrayBaraja[$i]['palo'] = $paloNuevo;
                            $puntuacion += $puntos[$arrayBaraja[$i]['numero']];
                            echo $arrayBaraja[$i]['numero']." de ".$arrayBaraja[$i]['palo']."<br>";
                            $i++; 
                        }    
                    }while($i < 39);
                ?>
                </p>
                
                

    </article>
    <article>
        <h3>Resultado</h3>
        <?php
            echo "<p>Puntuación: ".$puntuacion."</p>";
        ?>
   
        </article>
        </section>
        <nav>
            <a href="ej9.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej10.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
