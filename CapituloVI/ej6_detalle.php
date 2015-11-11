<?php 
    session_start(); // Inicio de sesión
    $codigo = $_POST['producto'];
    if (isset($_POST["enviar"])){//Cuando se compra o elimina se ejecuta este código
        //Si se compra un producto
        if ($_POST['enviar'] == "COMPRAR"){
            $codigoCompra = $_POST['comprita'];//Recojo el código del producto comprado
            /*Si no hay ningún producto introduce el codigo y la unidad se pone 
             * a uno, si ya existe el producto sñolo incrementa las unidades.*/
            $_SESSION['carrito'][$codigoCompra]++; }
            
        //Si se elimina se elimina un producto
        if ($_POST['enviar'] == "ELIMINAR"){
            $eliminado = $_POST['eliminado'];
            unset($_SESSION['carrito'][$eliminado]);
        }
    } 
    
?>
<!DOCTYPE html> 
<!--Ejercicio 6. Amplía el programa anterior de tal forma que se pueda ver el 
detalle de un producto. Para ello, cada uno de los productos del catálogo deberá 
tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista 
de detalle que contendrá una descripción exhaustiva del producto en cuestión. Se 
podrán añadir productos al carrito tanto desde la vista de listado como desde la 
vista de detalle.
-->

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP - Capitulo VI</title>  
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            img {
                width: 10em;
                height: 10em;
            }
        </style>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>APRENDE PHP CON EJERCICIOS</h1>
            <h2><a href= ../index.php>CAPITULO VI </a></h2>
	</header>
        <nav>
                <ul>
                    <li><a href="ej7.php">Ejercicio 7</a></li>
                    <li><a href="ej10.php">Ejercicio 10</a></li>
                    <li><a href="ej13.php">Ejercicio 13</a></li>
                    <li><a href="ej16.php">Ejercicio 16</a></li>
                    <li><a href="ej20.php">Ejercicio 20</a></li>
                    <li><a href="ej23.php">Ejercicio 23</a></li>
                    <li><a href="ej28.php">Ejercicio 28</a></li>
                </ul>
	</nav>
        <section>
            <article>
                <h3>Ejercicio 6</h3>
                <p>Amplía el programa anterior de talforma que se pueda ver el 
detalle de un producto. Para ello, cada uno de los productos del catálogo deberá 
tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista 
de detalle que contendrá una descripción exhaustiva del producto en cuestión. Se 
podrán añadir productos al carrito tanto desde la vista de listado como desde la 
vista de detalle.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Catálogo</p>
                <p>
                <?php
                    //Detalles del producto
                    echo " <br><img src='".$_SESSION['catalogo'][$codigo]['imagen']."'>".
                         " <br>Codigo: ".$codigo." <br>Nombre:".$_SESSION['catalogo'][$codigo]['nombre'].
                         " <br>Precio: ".$_SESSION['catalogo'][$codigo]['precio']. "€".
                         " <br>Descripción: ".$_SESSION['catalogo'][$codigo]['descripcion'].
                         /*Si se compra el producto se envía el código para meterlo en el carrito*/
                         " <form action='ej6.php' method='POST'>".
                         " <input type='hidden' name='comprita' value='".$codigo."'/>".
                         " <input type = 'submit' name='enviar' value='COMPRAR'>".
                         " </form>"
                         ;     
                    
                ?>
                    <br><a href="ej6.php">Volver</a>
                </p>
            </article>
            <article>
                <h3>Carrito</h3>
                <p>
                    <?php
                    //Imprimir el carrito
                       if (isset($_POST["enviar"])){
                           $total = 0;
                           foreach ($_SESSION['carrito'] as $compra => $unidades) {
                                echo " <br><img src='".$_SESSION['catalogo'][$compra]['imagen']."'>".
                                     " <br>Nombre :".$_SESSION['catalogo'][$compra]['nombre'].
                                     " <br>Precio :".$_SESSION['catalogo'][$compra]['precio']. "€".
                                     " <br>Unidades: ".$unidades.
                                     /*Si se elimina el producto se envía el código a arriba y se elimina del carrito*/
                                     " <form action='#' method='POST'>".
                                     " <input type='hidden' name='eliminado' value='".$compra."'/>".
                                     " <input type='hidden' name='producto' value='".$codigo."'/>".
                                     " <input type = 'submit' name='enviar' value='ELIMINAR'>".
                                     " </form>"
                                     ;
                                $total += $_SESSION['catalogo'][$compra]['precio']*$unidades;
                           }
                           echo "<br>Total: ".$total. " €";
                       }
                    ?>
                </p>
            </article>
        </section>
        <nav>
            <a href="index.php" id="anterior">Anterior</a>
            <a href="index.php" id="home">Home</a>
            <a href="ej10.php" id="siguiente">Siguiente</a>
        </nav>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>
