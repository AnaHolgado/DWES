<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 
<!--Ejercicio 1. 
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
            <h1>CAPICUA</h1>
            <h2><a href= "index.php">CAPICUA </a></h2>
	</header>
        <nav>
                <ul>
                    <li></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Capicua</h3>
                <p>¿Es capicuo?
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Capicua</p>
                <?php
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                    } else{
                        //declaración de variables
                        $contador = $_GET['contador'];
                        $numero = $_GET['numero'];
                        $arrayNum = $_GET['arrayNum'];//Array de precios
                        $arrayNum = unserialize($arrayNum);
                        $arrayNum[$contador] = $numero;//Añado nuevo precio
                        $contador++;
                    }
                ?>
                <form action="#" method="get"> 
                   <?php
                   if ($contador < 10){//Cuando se introducen los 10 precios desaparece el input
                    echo "<label>Número ". ($contador+1)."</label>";
                    echo'<input type="number" step="0.01" name="numero" autofocus>';
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
                for ($i = 0; $i < 10; $i++){
                    $numCap = $arrayNum[$i];
                    $falta = $numCap;
                    $numRev = 0;
                    $resto = 1;
                    while ($falta != 0 && $resto > 0){
                        $resto = $falta%10;
                        $numRev = $numRev*10 + $resto;
                        $falta = $falta / 10;
                    }
                    $numRev /=10;
                    echo "<div";
                    if($numCap == $numRev){
                        echo " class = 'capicua'>".$arrayNum[$i];
                    } else {
                        echo ">".$arrayNum[$i];
                    }
                    echo "</div>";
                }
            }
        ?>
       
        
        </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
