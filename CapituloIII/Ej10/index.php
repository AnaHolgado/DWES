<!DOCTYPE html> 
<!--Ejercicio 10. Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.

-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo III</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO III </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="../Ej2/index.php">Ejercicio 2</a></li>
                    <li><a href="../Ej9/index.php">Ejercicio 9</a></li>
                    <li><a href="../Ej10/index.php">Ejercicio 10</a></li>
                    <li><a href="../Ej11/index.php">Ejercicio 11</a></li>
                    <li><a href="../Ej12/index.php">Ejercicio 12</a></li>
                    <li><a href="../Ej13/index.php">Ejercicio 13</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 10</h3>
                <p>Escribe un programa que nos diga el horóscopo a partir del 
                    día y el mes de nacimiento.</p>
            </article>
        <article>
            <h3>Ejercicio Resuelto</h3>
            <p>Introduzca su fecha de nacimiento</p>
        <form action="index.php" method="get"> 
            <label>Dia </label><input type="number" min = "1" max ="31" name="dia"> <br> 
            <label>Mes </label> <select name="mes">
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
              </select>
            <input type="submit" value="Enviar" name = "enviar"> 
        </form> 
        </article>
        <article>
            <h3>Horoscopo</h3>
            <p>
        <?php
        
            $dia = $_GET['dia'];
            $mes = $_GET['mes'];

         if ($dia && $mes){
                switch ($mes){
                    case "Enero":
                        if ($dia <= 20){
                            echo "Capricornio";
                        }else {
                            echo "Acuario";
                        }
                        break;
                    case "Febrero":
                        if ($dia <= 19){
                            echo "Acuario";
                        }else if ($dia <= 29){
                            echo "Piscis";
                        }
                        break;
                    case "Marzo":
                        if ($dia <= 20){
                            echo "Piscis";
                        }else {
                            echo "Aries";
                        }
                        break;
                    case "Abril":
                        if ($dia <= 20){
                            echo "Aries";
                        }else if ($dia <= 30) {
                            echo "Tauro";
                        }
                        break;
                    case "Mayo":
                        if ($dia <= 21){
                            echo "Tauro";
                        }else  {
                            echo "Géminis";
                        }
                        break;
                    case "Junio":
                        if ($dia <= 22){
                            echo "Géminis";
                        }else if ($dia <= 30) {
                            echo "Cancer";
                        }
                        break;
                    case "Julio":
                        if ($dia <= 23){
                            echo "Cancer";
                        }else {
                            echo "Leo";
                        }
                        break;
                    case "Agosto":
                        if ($dia <= 23){
                            echo "Leo";
                        }else {
                            echo "Virgo";
                        }
                        break;
                    case "Septiembre":
                        if ($dia <= 23){
                            echo "Virgo";
                        }else if ($dia <= 30){
                            echo "Libra";
                        }
                        break;
                    case "Octubre":
                        if ($dia <= 23){
                            echo "Libra";
                        }else {
                            echo "Escorpio";
                        }
                        break;
                    case "Noviembre":
                        if ($dia <= 22){
                            echo "Escorpio";
                        }else if ($dia <= 30){
                            echo "Sagitario";
                        }
                        break;
                    case "Diciembre":
                        if ($dia <= 21){
                            echo "Sagitario";
                        }else {
                            echo "Capricornio";
                        }
                        break;
                        
                        
                }
                
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="../Ej9/index.php" id="anterior">Anterior</a>
            <a href="../index.php" id="home">Home</a>
            <a href="../Ej12/index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
