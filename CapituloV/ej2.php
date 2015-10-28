<!DOCTYPE html> 
<!--Ejercicio 2. Escribe un programa que pida 10 números por teclado y que luego 
muestre los números introducidos junto con las palabras “máximo” y “mínimo” al 
lado del máximo y del mínimo respectivamente.
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
                <h3>Ejercicio 2</h3>
                <p>Escribe un programa que pida 10 números por teclado y que luego 
muestre los números introducidos junto con las palabras “máximo” y “mínimo” al 
lado del máximo y del mínimo respectivamente.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Introduzca 10 números, por favor.</p>
                <?php
                    if (!isset($_REQUEST['enviar'])){
                            $contador = 0;
                            $diezNumeros = "";
                            
                    }else {
                        $contador = $_GET['contador'];
                        $numero = $_GET['numero'];
                        $diezNumeros = $_GET['diezNumeros'];
                        $contador++;
                    }
                ?>
                <form action="#" method="get"> 
                   <label>Numero:</label><input type="text" name="numero" autofocus>
                   <input type="hidden" name="contador" value=<?=$contador?>>
                   <input type="hidden" name="diezNumeros" value="<?=$diezNumeros . " " . $numero?>">
                   <br>
                <?php   
                   if ($contador <10){
                   echo '<input type="submit" name="enviar" value ="Enviar">';
                   }
                ?>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            if ($contador == 10){
                $diezNumeros = $diezNumeros . " " . $numero;
                $diezNumeros = substr($diezNumeros, 2);
                $arrayNumeros = explode(" ", $diezNumeros);
                $min = 1000000000;
                $max = -1000000000;
                foreach ($arrayNumeros as $n){
                    if($min > $n){
                        $min = $n;
                    }
                    if($max < $n){
                        $max = $n;
                    }
                }
                foreach ($arrayNumeros as $n) {
                    if ($n == $max){
                        echo "Maximo: ";
                    }
                    if ($n == $min){
                        echo "Minimo: ";
                    }
                    echo $n."<br>";
                }
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej1.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej3.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>