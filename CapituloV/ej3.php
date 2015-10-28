<!DOCTYPE html> 
<!--Ejercicio 3. Escribe un programa que lea 15 números por teclado y que los 
almacene en un array. Rota los elementos de ese array, es decir, el elemento de 
la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número que 
se encuentra en la última posición debe pasar a la posición 0. Finalmente, 
muestra el contenido del array.
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
                <h3>Ejercicio 3</h3>
                <p>Escribe un programa que lea 15 números por teclado y que los 
almacene en un array. Rota los elementos de ese array, es decir, el elemento de 
la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número que 
se encuentra en la última posición debe pasar a la posición 0. Finalmente, 
muestra el contenido del array.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Rotar 15 numeros</p>
                <?php
                    if (!isset($_REQUEST['enviar'])){
                            $contador = 0;
                            $quinceNumeros = "";
                            
                    }else {
                        $contador = $_GET['contador'];
                        $numero = $_GET['numero'];
                        $quinceNumeros = $_GET['quinceNumeros'];
                        $contador++;
                    }
                ?>
                <form action="#" method="get"> 
                   <label>Numero:</label><input type="text" name="numero" autofocus>
                   <input type="hidden" name="contador" value=<?=$contador?>>
                   <input type="hidden" name="quinceNumeros" value="<?=$quinceNumeros . " " . $numero?>">
                   <br>
                <?php   
                   if ($contador <15){
                   echo '<input type="submit" name="enviar" value ="Enviar">';
                   }
                ?>

    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            if ($contador == 15){
                $quinceNumeros = $quinceNumeros . " " . $numero;
                $quinceNumeros = substr($quinceNumeros, 1);
                $arrayNumeros = explode(" ", $quinceNumeros);
                $arrayNumeros[0] = $aux;
                foreach ($arrayNumeros as $n){
                    echo $n." ";
                }
                echo "<br>";
                $aux = $arrayNumeros[15];
                for ($i = 15 ; $i >= 1 ; $i--){
                    $arrayNumeros[$i] = $arrayNumeros[$i-1];
                }
                $arrayNumeros[0] = $aux;
                foreach ($arrayNumeros as $n){
                    echo $n." ";
                }
             
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="ej2.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej3.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
