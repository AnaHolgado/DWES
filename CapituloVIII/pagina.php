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
        <!--<link type="text/css" rel="stylesheet" href="css/style.css"/>-->
    </head> 
    
    <body> 
      <header  id = "header" class = "card-panel blue white-text center-align">
        <hgroup>
          <h1>APRENDE PHP CON EJERCICIOS</h1>
          <h2><a class = "white-text" href= ../index.php>CAPITULO VII </a></h2>
        </hgroup>
        <ul id="desplegable" class="dropdown-content">
          <li><a class="blue-text" href="pagina.php?ejercicio=ej1_index_mysql">MYSQL</a></li>
          <li><a class="blue-text" href="pagina.php?ejercicio=ej1_index_mysqli">MYSQLI</a></li>
          <li><a class="blue-text" href="pagina.php?ejercicio=ej1_index_PDO">PDO</a></li>
        </ul>
        <nav class = "blue">
          <ul class = "container flow-text center-align row">
              <li class="col s1">&nbsp;</li>
              <li class="col s2"><a href="#" class="dropdown-button" data-activates="desplegable">EJERCICIO 1</a></li>
              <li class="col s2"><a href="pagina.php?ejercicio=ej2_index">EJERCICIO 2</a></li>
              <li class="col s2"><a href="pagina.php?ejercicio=ej3_index">EJERCICIO 3</a></li>
              <li class="col s2"><a href="pagina.php?ejercicio=ej4_index">EJERCICIO 4</a></li>
              <li class="col s2"><a href="pagina.php?ejercicio=ej5_index">EJERCICIO 5</a></li>
              <li class="col s1">&nbsp;</li>
          </ul>
        </nav>
	</header>
        <div class="limpia"></div>
        <main class="section">
        <?php
        
          include $_REQUEST['ejercicio'].'.php'; 
        
        /* Conexión por mysqli
        $conexion = new mysqli("localhost", "root", "root"); 
        if ($conexion->connect_errno > 0) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $conexion->connect_error); 
        } else { 
          include $_REQUEST['ejercicio'].'.php';
        } */
        /*Conexion por mysql
          $conexion = mysql_connect("localhost", "root", "root"); 
          if ($conexion) { 
            include $_REQUEST['ejercicio'].'.php';
          } else { 
          echo "<section class='container flow-text center-align red-text'>No se ha podido establecer conexión con el servidor de bases de datos.</section"; 
          }*/
        
        ?>
        </main>
        <div class ="divider"></div>
        <footer class = "section center-align">
            <a class = "blue btn" href="index.html" id="home">Home</a><br>
            <p class = "center-align card-panel blue white-text"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>