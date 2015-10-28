<!DOCTYPE html> 
<!--Ejercicio 9. Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se mostrará el contenido de ese array junto 
al índice(0–9). Seguidamente el programa pedirá dos posiciones a las que 
llamaremos “inicial” y “final”. Se debe comprobar que inicial es menor que final  
y que ambos números están entre 0 y 9. El programa deberá colocar el número de 
la posición inicial en la posición final, rotando el resto de números para que 
no se pierda ninguno. Al final se debe mostrar el array resultante. 
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
                <h3>Ejercicio 9</h3>
                <p>Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se mostrará el contenido de ese array junto 
al índice(0–9). Seguidamente el programa pedirá dos posiciones a las que 
llamaremos “inicial” y “final”. Se debe comprobar que inicial es menor que final  
y que ambos números están entre 0 y 9. El programa deberá colocar el número de 
la posición inicial en la posición final, rotando el resto de números para que 
no se pierda ninguno. Al final se debe mostrar el array resultante. 
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Rotar a otra posicion</p>
                <p>
                    
                <?php
                    
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                    }

                    if(isset($_REQUEST['enviar'])){
                        $contador = $_GET['contador'];
                        $numero = $_GET['numero'];
                        $arrayNum = $_GET['arrayNum'];
                        $arrayNum = unserialize($arrayNum);
                        if ($contador < 10){
                            $arrayNum[$contador] = $numero;
                            $contador++;
                        }
                        $posPrimera = $_GET['primero'];
                        $posNueva = $_GET['segundo'];
                        
                    }
                ?>
                </p>
                <br>
                <form action="#" method="get"> 
                   <?php
                   if ($contador < 10){
                    echo "<label>Número </label>". ($contador);
                    echo'<input type="number" step="1" name="numero" autofocus>';
                   }
                   if ($contador == 10 || $posPrimera > $posNueva ){
                       if ($posPrimera > $posNueva){
                           echo "<p>La posicion inicial a de ser menor que la final, gracias.</p>";
                       }
                       echo'<label>Posicion inicial: </label><input type="number" step="1" min="0" max="9" name="primero" autofocus>';
                       echo'<br><label>Posicion final: </label> <input type="number" step="1" min="0" max="9" name="segundo">';
                   }
                   ?>
                   <input type="hidden" name="contador" value=<?= $contador?>>
                   <input type="hidden" name="arrayNum" value=<?= serialize($arrayNum)?>>
                   <br>
                   
                   <input type="submit" name="enviar" value ="Enviar"><br>;

                </form>
                

    </article>
    <article>
        <h3>Resultado</h3>
        <p>Array Inicial</p>
        <table class ="eje9">
            <tr>
        <?php
        
            for ($i = 0 ; $i < 10 ; $i++){
                echo "<th>".$i."</th>";
            }
            echo "</tr><tr>";
            foreach ($arrayNum as $numero) {
                echo "<td>".$numero."</td>";
            }
            echo "</tr></table>";
        if($posPrimera < $posNueva){
            echo "<p>Array Final</p><table class =  'eje9'><tr>";
            for ($i = 0 ; $i < 10 ; $i++){
                echo "<th>".$i."</th>";
            }
            echo "</tr><tr>";
            $cero = $posNueva-$posPrimera;
            for ($i = 0, $j = $cero; $j < 10; $i++,$j++){
                $arrayResultante[$j] = $arrayNum[$i];
            }
            for ($i = 10-$cero, $j = 0 ; $j < $cero ; $i++, $j++){
                $arrayResultante[$j] = $arrayNum[$i];
            }
            for ($i = 0; $i < 10 ; $i++){
                echo "<td>".$arrayResultante[$i]."</td>";
            }
            echo "</tr></table>";
        }
        ?>
   
        </article>
        </section>
        <nav>
            <a href="ej8.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej10.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
