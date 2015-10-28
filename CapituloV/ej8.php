<!DOCTYPE html> 
<!--Ejercicio 8. Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se mostrará el contenido de ese array junto 
al índice (0 – 9) utilizando para ello una tabla. Seguidamente el programa pasará 
los primos a las primeras posiciones, desplazando el resto de números (los que 
no son primos)de tal forma que no se pierda ninguno. Al final se debe mostrar el 
array resultante.
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
                <h3>Ejercicio 8</h3>
                <p>Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se mostrará el contenido de ese array junto 
al índice (0 – 9) utilizando para ello una tabla. Seguidamente el programa pasará 
los primos a las primeras posiciones, desplazando el resto de números (los que 
no son primos)de tal forma que no se pierda ninguno. Al final se debe mostrar el 
array resultante.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Primos Primero</p>
                <p>
                    
                <?php
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                        $contadorPrimos = 0;
                        $primo = true;
                    } else{
                        $contador = $_GET['contador'];
                        $numero = $_GET['numero'];
                        $arrayNum = $_GET['arrayNum'];
                        $arrayNum = unserialize($arrayNum);
                        $arrayNum[$contador] = $numero;
                        $contador++;
                    }
                ?>
                </p>
                <br>
                <form action="#" method="get"> 
                   <?php
                   if ($contador < 10){
                    echo "Número ". ($contador);
                    echo'<input type="number" step="1" name="numero" autofocus>';
                   }
                   ?>
                   <input type="hidden" name="contador" value=<?= $contador?>>
                   <input type="hidden" name="arrayNum" value=<?= serialize($arrayNum)?>>
                   <?php
                   if ($contador < 10){
                       echo '<input type="submit" name="enviar" value ="Enviar"><br>';
                   }
                   
                   ?>
                </form>
                

    </article>
    <article>
        <h3>Resultado</h3>
        
        <table id="eje8">
            <tr>
        <?php
            for ($i = 0 ; $i < 10 ; $i++){
                echo "<th>".$i."</th>";
            }
            echo "</tr><tr>";
            foreach ($arrayNum as $numero) {
                echo "<td>".$numero."</td>";
            }
            echo "</tr><tr>";
            foreach ($arrayNum as $numero) {
                $primo = true;
                for ($i = 2; $i < $numero; $i++){
                    if ($numero%$i == 0){
                        $primo = false;
                    }
                }
                if ($primo== true){
                    $arrayPrimosPrimero[$contadorPrimos]= $numero;
                    echo "<td class='primo'>".$arrayPrimosPrimero[$contadorPrimos]."</td>";
                    $contadorPrimos++;
                }
            }    
            foreach ($arrayNum as $numero) {
                for ($i = 2; $i < $numero; $i++){
                    if ($numero%$i == 0){
                        $arrayPrimosPrimero[$contadorPrimos]= $numero;
                        echo "<td>".$arrayPrimosPrimero[$contadorPrimos]."</td>";
                        $contadorPrimos++;
                        $i = $numero;
                    }
                }
            }
        ?>
            </tr>
        </table>
       
        </article>
        </section>
        <nav>
            <a href="ej7.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej9.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
