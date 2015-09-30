<!DOCTYPE html> 
<!--Ejercicio 13. Escribe un programa que ordene tres números enteros introducidos por teclado.

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
                <h3>Ejercicio 13</h3>
                <p>Escribe un programa que ordene tres números enteros introducidos por teclado.</p>
            </article>
            <article>
                <h3>Ordenar Números</h3>
                <form action="index.php" method="get"> 
                   <label>Numero 1:</label><input type="number" name="numero1">
                   <label>Numero 2:</label><input type="number" name="numero2">
                   <label>Numero 3:</label><input type="number" name="numero3">
                   <input type="submit" name="enviar" value ="Enviar">
                </form> 
            </article>
            <article>
                <h3>Solución</h3>
                <p>
                <?php
                    $enviar =$_GET['enviar'];

                    if ($enviar){
                     $num1 = $_GET['numero1'];  
                     $num2 = $_GET['numero2'];  
                     $num3 = $_GET['numero3']; 
                     $aux;
                     $menor = ($num1 <= $num2 && $num1 <= $num3)?$num1: (($num2 <= $num1 && $num2 <= $num3)?$num2:$num3);
                     $mayor = ($num1 >= $num2 && $num1 >= $num3)?$num1: (($num2 >= $num1 && $num2 >= $num3)?$num2:$num3);
                     $medio = $num1 + $num2 + $num3 -$mayor -$menor;

                     echo "Menor: ".$menor;
                     echo "Medio: ".$medio;
                     echo "Mayor: ".$mayor;
                    }
                ?>
                </p>
        </article>
        </section>
        <nav>
            <a href="../Ej12/index.php" id="anterior">Anterior</a>
            <a href="../index.php" id="home">Home</a>
            <a href="../index.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
