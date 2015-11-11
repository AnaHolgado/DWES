<?php session_start(); ?>
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo VI</title>  
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head> 
    
    <body> 
        <header  id = "header" class = "blue white-text center-align">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a class = "white-text" href= ../index.php>CAPITULO VI </a></h2>
	</header>
        <nav id ="nav-principal" class = "#2196f3 blue">
                <ul class = "container flow-text">
                    <li><a href="ej1.php">EJERCICIO 1</a></li>
                    <li><a href="ej2.php">EJERCICIO 2</a></li>
                    <li><a href="ej3.php">EJERCICIO 3</a></li>
                    <li><a href="ej4.php">EJERCICIO 4</a></li>
                    <li><a href="ej5.php">EJERCICIO 5</a></li>
                    <li><a href="ej6.php">EJERCICIO 6</a></li>
                    <li><a href="ej7.php">EJERCICIO 7</a></li>
                    <li><a href="ej8.php">EJERCICIO 8</a></li>
                    <li><a href="pagina.php?ejercicio=ej9_index">EJERCICIO 9</a></li>
                </ul>
	</nav>
        <section class="section container center-align flow-text">
    
        <?php
          include $_REQUEST['ejercicio'].'.php';
        ?>
        <div class ="divider"></div>
        <footer class = "section center-align">
            <a class = "white-text blue btn" href="index.html" id="home">Home</a><br>
            <p class = "center-align card-panel #2196f3 blue white-text"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>