<!DOCTYPE html> 
<!--Ejercicio 7. Escribe un programa que genere 20 números enteros aleatorios 
entre 0 y 100 y que los almacene en un array. El programa debe ser capaz de pasar 
todos los números pares a las primeras posiciones del array (del 0en adelante) y 
todos los números impares a las celdas restantes. Utiliza arrays auxiliares si 
es necesario.
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
                <h3>Ejercicio 7</h3>
                <p>Escribe un programa que genere 20 números enteros aleatorios 
entre 0 y 100 y que los almacene en un array. El programa debe ser capaz de pasar 
todos los números pares a las primeras posiciones del array (del 0 en adelante) y 
todos los números impares a las celdas restantes. Utiliza arrays auxiliares si 
es necesario.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Pares Primero</p>
                <p>
                <?php
                    for ($i = 0 ; $i < 20 ; $i++){
                        $arrayOriginal[$i]= rand(0,100);
                    }
                    foreach ($arrayOriginal as $n) {
                        echo $n." ";
                    } 
                ?>
                </p>
                <br>
                

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            $contador = 0;
            foreach ($arrayOriginal as $numero) {
                if($numero%2 == 0){
                    $arrayNuevo[$contador]= $numero;
                    $contador++;
                }
            }
            foreach ($arrayOriginal as $numero) {
                if($numero%2 != 0){
                    $arrayNuevo[$contador]= $numero;
                    $contador++;
                }
            }
            for ($j = 0; $j < 20 ; $j++){
                echo $arrayNuevo[$j]." ";
            }
            
                        
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej6.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej8.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
