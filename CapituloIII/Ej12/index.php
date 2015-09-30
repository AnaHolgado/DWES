<!DOCTYPE html> 
<!--Ejercicio 12. Realiza un minicuestionario con 10 preguntas tipo test sobre 
las asignaturas que se imparten en el curso. Cada pregunta acertada sumará un 
punto. El programa mostrará al final la calificación obtenida. Pásale el 
minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan 
de conocimientos en las diferentes asignaturas del curso.

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
                <h3>Ejercicio 12</h3>
                <p>Realiza un minicuestionario con 10 preguntas tipo test sobre 
las asignaturas que se imparten en el curso. Cada pregunta acertada sumará un 
punto. El programa mostrará al final la calificación obtenida. Pásale el 
minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan 
de conocimientos en las diferentes asignaturas del curso.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Minicuestonario</p>
        <form action="index.php" method="get"> 
            <label>Pregunta 1</label><br>
            <label>a</label><input type="radio" name="Pregunta1" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta1" value="0" > <br>
            <label>Pregunta 2</label><br>
            <label>a</label><input type="radio" name="Pregunta2" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta2" value="0" > <br>
            <label>Pregunta 3</label><br>
            <label>a</label><input type="radio" name="Pregunta3" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta3" value="0" > <br>
            <label>Pregunta 4</label><br>
            <label>a</label><input type="radio" name="Pregunta4" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta4" value="0" > <br>
            <label>Pregunta 5</label><br>
            <label>a</label><input type="radio" name="Pregunta5" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta5" value="0" > <br>
            <label>Pregunta 6</label><br>
            <label>a</label><input type="radio" name="Pregunta6" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta6" value="0" > <br>
            <label>Pregunta 7</label><br>
            <label>a</label><input type="radio" name="Pregunta7" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta7" value="0" > <br>
            <label>Pregunta 8</label><br>
            <label>a</label><input type="radio" name="Pregunta8" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta8" value="0" > <br>
            <label>Pregunta 9</label><br>
            <label>a</label><input type="radio" name="Pregunta9" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta9" value="0" > <br>
            <label>Pregunta 10</label><br>
            <label>a</label><input type="radio" name="Pregunta10" value="1" > <br> 
            <label>b</label><input type="radio" name="Pregunta10" value="0" > <br>
            <input type="submit" value="Enviar" name = "enviar"> 
        </form> 
    </article>
    <article>
        <h3>Resultado</h3>
        <p>
        <?php
            $enviar =$_GET['enviar'];
            $suma = 0;
            if ($enviar){
               for ($i = 1 ; $i <= 10 ; $i++){
                   $suma += $_GET['Pregunta'.$i];
            }
                echo $suma;
            }
        ?>
        </p>
        </article>
        </section>
        <nav>
            <a href="../Ej10/index.php" id="anterior">Anterior</a>
            <a href="../index.php" id="home">Home</a>
            <a href="../Ej13/index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
