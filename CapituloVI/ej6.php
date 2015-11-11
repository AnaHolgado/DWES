<?php 
    session_start(); // Inicio de sesión
    
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
    } else {//Inicializacion de variables antes de que se compre ningún producto
        $_SESSION['carrito'] = [];//Inicializo el array del carrito, aunque no es necesario
        //Inicializo el catálogo de productos
        $_SESSION['catalogo'] = ["COD01" => ["nombre" => "gato", "descripcion" => "felino 4 patas", "precio" => 600, "imagen" => "images/gato.png" , "unidades" => 0],
                            "COD02" => ["nombre" => "perro", "descripcion" => "animal 4 patas", "precio" => 100, "imagen" => "images/perro.png"],
                            "COD03" => ["nombre" => "conejo", "descripcion" => "roedor de orejas largas", "precio" => 50, "imagen" => "images/conejo.png"]
        ];
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
tener un botón*Detalle que, al ser accionado, debe llevar al usuario a la vista 
de detalle que contendrá una descripción exhaustiva del producto en cuestión. Se 
podrán añadir productos al carrito tanto desde la vista de listado como desde la 
vista de detalle.</p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Catálogo</p>
                <p>
                <?php
                    //Imprimo el catálogo
                    foreach ($_SESSION['catalogo'] as $key => $value) {
                        echo " <br><img src='".$value['imagen']."'>".
                             " <br>Codigo: ".$key." <br>Nombre:".$value['nombre'].
                             " <br>Precio: ".$value['precio']. "€".
                             /*Si se compra el producto se envía el código para meterlo en el carrito*/
                             " <form action='#' method='POST'>".
                             " <input type='hidden' name='comprita' value='".$key."'/>".
                             " <input type = 'submit' name='enviar' value='COMPRAR'>".
                             " </form>".
                             " <form action='ej6_detalle.php' method='POST'>".
                             " <input type='hidden' name='producto' value='".$key."'/>".
                             " <input type = 'submit' name='enviar' value='DETALLE'>".
                             " </form>"
                            ;     
                    }
                ?>
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
