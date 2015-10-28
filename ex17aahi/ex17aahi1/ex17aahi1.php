<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 
<!--Ejercicio 1. Escribe un programa que pida 6 números uno detrás de otro (no 
se pueden pedir los 6 en la misma página) y que, a continuación, muestre el 
máximo, el mínimo y el número de primos (solo la cantidad).
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
                <h3>Ejercicio 1</h3>
                <p>Escribe un programa que pida 6 números uno detrás de otro (no 
se pueden pedir los 6 en la misma página) y que, a continuación, muestre el 
máximo, el mínimo y el número de primos (solo la cantidad).
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Máximo, Mínimo y Primos</p>
                <?php
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                    } else{
                        //declaración de variables
                        $contador = $_GET['contador'];
                        $pieza = $_GET['numero'];//Recojo el número
                        $arrayNum = $_GET['arrayNum'];//Array de número
                        $arrayNum = unserialize($arrayNum);
                        $arrayNum[$contador] = $pieza;//Añado nuevo número
                        $contador++;
                    }
                ?>
                <form action="#" method="get"> 
                   <?php
                   if ($contador < 6){//Cuando se introducen los 10 precios desaparece el input
                    echo "<label>Número ". ($contador+1)."</label>";
                    echo'<input type="number" step="1" name="numero" autofocus>';
                   }
                   ?>
                   <input type="hidden" name="contador" value=<?= $contador?>>
                   <input type="hidden" name="arrayNum" value=<?= serialize($arrayNum)?>>
                   <?php
                   if ($contador < 6){
                       echo '<input type="submit" name="enviar" value ="Enviar"><br>';
                   }
                   
                   
                   ?>
                </form>
    </article>
    <article>
        <h3>Resultado</h3>
        <div>
        <?php
            
            if ($contador == 6){
                $max = -PHP_INT_MAX;
                $min = PHP_INT_MAX;
                foreach ($arrayNum as $n){
                    if($min > $n){
                        $min = $n;
                    }
                    if($max < $n){
                        $max = $n;
                    }
                }
                $contadorPrimos = 0;
                foreach ($arrayNum as $pieza) {
                    $primo = true;
                    for ($i = 2; $i < $pieza; $i++){
                        if ($pieza%$i == 0){
                            $primo = false;
                        }
                    }
                    if ($primo== true && $pieza !=1 && $pieza !=-1){
                        $contadorPrimos++;
                    }
                }
             
                echo "<p>Maximo:".$max."</p>";
                echo "<p>Minimo:".$min."</p>";
                echo "<p>Cantidad Primos:".$contadorPrimos."</p>";
                
            }
        ?>
        </div>
        
        </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
