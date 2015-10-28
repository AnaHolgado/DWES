<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 
<!--Ejercicio 2. Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se debe mostrar el contenido de ese array 
junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna 
y en orden los pares y los impares: primero par, luego impar, luego par, luego 
impar… Cuando se acaben los pares o los impares, se completará con los números 
que queden.
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
                <h3>Ejercicio 2</h3>
                <p>Realiza un programa que pida 10 números por teclado y que los 
almacene en un array. A continuación se debe mostrar el contenido de ese array 
junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna 
y en orden los pares y los impares: primero par, luego impar, luego par, luego 
impar… Cuando se acaben los pares o los impares, se completará con los números 
que queden.
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Alternar Pares e Impares</p>
                <?php
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                    } else{
                        //declaración de variables
                        $contador = $_GET['contador'];
                        $pieza = $_GET['numero'];
                        $arrayNum = $_GET['arrayNum'];
                        $arrayNum = unserialize($arrayNum);
                        $arrayNum[$contador] = $pieza;
                        $contador++;
                    }
                ?>
                <form action="#" method="get"> 
                   <?php
                   if ($contador < 10){
                    echo "<label>Número ". ($contador+1)."</label>";
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
        
        <?php
            if ($contador == 10){
            //Impirmir Array Original
                echo"<p>Array Original</p>";
                echo "<table><tr>";
                for ($i = 0; $i <= 9; $i++){
                    echo "<th>".$i."</th>";
                }
                echo "</tr><tr>";
                for ($i = 0; $i < 10; $i++){
                    echo "<td>".$arrayNum[$i]."</td>";
                }
                echo "<tr></table>";
            
            $contadorPar = 0;
            $contadorImpar = 0;
            for ($i = 0; $i <10 ; $i++){
                if ($arrayNum[$i]%2 == 0){
                    $arrayPar[$contadorPar]=$arrayNum[$i];
                    $contadorPar++;
                } else {
                    $arrayImpar[$contadorImpar]=$arrayNum[$i];
                    $contadorImpar++;
                }
            }
            $contadorArray = 0;
            $j = 0;
            $k = 0;
            do{
                if ($contadorPar > 0){
                    $arrayNum[$contadorArray] = $arrayPar[$j];
                    $j++;
                    $contadorPar--;
                    $contadorArray++;
                } 
                if($contadorImpar > 0){
                    $arrayNum[$contadorArray] = $arrayImpar[$k];
                    $k++;
                    $contadorImpar--;
                    $contadorArray++;
                }
            }while($contadorArray < 10);
            
            //Impirmir Array Nuevo
                echo"<p>Array Resultador</p>";
                echo "<table><tr>";
                for ($i = 0; $i <= 9; $i++){
                    echo "<th>".$i."</th>";
                }
                echo "</tr><tr>";
                for ($i = 0; $i < 10; $i++){
                    echo "<td>".$arrayNum[$i]."</td>";
                }
                echo "<tr></table>";
        }
        ?>
        </table
        
        </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
