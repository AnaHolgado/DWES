<!DOCTYPE html> 
<!--Ejercicio 5. Realiza un programa que pida la temperatura media que ha hecho 
en cada mes de un determinado año y que muestre a continuación un diagrama de 
barras horizontales con esos datos. Las barras del diagrama se pueden dibujar a 
base de la concatenación de una imagen.
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
                <h3>Ejercicio 5</h3>
                <p>Realiza un programa que pida la temperatura media que ha hecho 
en cada mes de un determinado año y que muestre a continuación un diagrama de 
barras horizontales con esos datos. Las barras del diagrama se pueden dibujar a 
base de la concatenación de una imagen. 
                </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p> Temperaturas</p>
                <p>
                <?php
                    $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto",
                            "septiembre","octubre", "noviembre", "diciembre");
                    if(!isset($_REQUEST['enviar'])){
                        $contador = 0;
                        $temp = "";
                    } else if(isset($_REQUEST['enviar']) || isset($_REQUEST['pintar'])){
                        $contador = $_GET['contador'];
                        $temperatura = $_GET['temperatura'];
                        $temp = $_GET['temp'];
                        $temp = unserialize($temp);
                        $temp[$contador]= $temperatura;
                        $contador++;
                    }
                    
                ?>
                </p>
                <br>
                <form action="#" method="get"> 
                   <label><?php echo $meses[$contador];?></label>
                   <?php
                   if ($contador < 12){
                    echo'<input type="text" name="temperatura" autofocus>';
                   }
                   ?>
                   <input type="hidden" name="contador" value=<?= $contador?>>
                   <input type="hidden" name="temp" value=<?= serialize($temp)?>>
                   <?php
                   if ($contador < 11){
                       echo '<input type="submit" name="enviar" value ="Enviar"><br>';
                   }
                   
                   else if ($contador == 11){
                        echo'<input type="submit" name="enviar" value ="Pintar"><br>';
                   }
                   ?>
                </form>

    </article>
    <article>
        <h3>Resultado</h3>
        <table id="eje5">
            
        <?php
            if ($contador == 12){
                echo '<tr><th>Meses</th><th>Temperatura</th><th>Grafico</th></tr>';
                for($i = 0 ; $i < 12 ; $i++ ){
                    echo "<tr><td>".$meses[$i]."</td><td>".$temp[$i]."</td><td>";
                    for($j = 0 ; $j < $temp[$i]; $j++){
                            echo "<span class='ancho'>1</span>";
                    }
                    echo "</td></tr>";
                }
            }
        ?>
        </tr>
        </table>
        </article>
        </section>
        <nav>
            <a href="ej4.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej6.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
