<!DOCTYPE html> 
<!--Ejercicio 1. Define tres arrays de 20 números enteros cada una, con nombres 
“numero”, “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios 
entre 0 y 100. En el array “cuadrado” se deben almacenar los cuadrados de los 
valores que hay en el array “numero”. En el array “cubo” se deben almacenar los 
cubos de los valores que hay en “numero”. A continuación, muestra el contenido 
de los tres arrays dispuesto en tres columnas.
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
                <h3>Ejercicio 1</h3>
                <p>Define tres arrays de 20 números enteros cada una, con nombres 
                    “numero”, “cuadrado” y “cubo”. Carga el array “numero” con 
                    valores aleatorios entre 0 y 100. En el array “cuadrado” se 
                    deben almacenar los cuadrados de los valores que hay en el 
                    array “numero”. En el array “cubo” se deben almacenar los 
                    cubos de los valores que hay en “numero”. A continuación, 
                    muestra el contenido de los tres arrays dispuesto en tres 
                    columnas.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Numeros, Cuadrados y Cubos</p>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <table id="eje1">
        <?php
            //Definición de variables
            $numero = new SplFixedArray(20);
            $cuadrado = new SplFixedArray(20);
            $cubo = new SplFixedArray(20);
            //meter con random los números en el array números
            echo "<tr><th>Números</th><th>Cuadrados</th><th>Cubos</th></tr>";
            for ($i = 0 ; $i < 20 ; $i++){
                $numero[$i] = rand(0,100);
                $cuadrado[$i] = $numero[$i]*$numero[$i];
                $cubo[$i] = $cuadrado[$i]*$numero[$i];
                echo "<tr><td>".$numero[$i]."</td><td>".$cuadrado[$i]."</td><td>".$cubo[$i]."</td></tr>";
            }
        ?>
        </table>
        </p>
        </article>
        </section>
        <nav>
            <a href="index.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej2.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
