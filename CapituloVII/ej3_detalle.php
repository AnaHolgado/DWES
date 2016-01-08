<?php 
    session_start(); // Inicio de sesión
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
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
<link type="text/css" rel="stylesheet" href="css/styleTienda.css"  media="screen,projection"/>
            <article>
                <h3>EJERCICIO 3</h3>
                <p>Amplía el ejercicio 6 de tal forma que los productos que se 
pueden elegir para comprar se almacenen en cookies. La aplicación debe ofrecer, 
por tanto, las opciones de alta, baja y modificación de productos.</p>  
            </article>
        </section>
        <div class ="divider"></div>
        <section class ="section">
            <article>
                <nav id="boton" class = "blue flow-text">
                    <ul>
                        <li><a class="center-align" href="pagina.php?ejercicio=ej3_AdministradorProductos">GESTIÓN DE PRODUCTOS</a></li>
                    </ul>
                </nav>
            </article>
        </section>
        <div class ="divider"></div>
        <section class="section container row">
            <article id = "catalogo" class = "col s8">
                <h3  class="center-align blue white-text">CATÁLOGO</h3>
                <section class = "center-align flow-text">
                <?php
                    //Detalles del producto
                $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo = '".$_POST['producto']."'");
                $registro = $consulta->fetchObject();
                
                    echo " <br><img src='images/".$registro->imagen."'>".
                         " <br>Codigo: ".$registro->codigo." <br>Nombre:".$registro->nombre.
                         " <br>Precio: ".$registro->precio. "€".
                         " <br>Descripción: ".$registro->descripcion.
                         /*Si se compra el producto se envía el código para meterlo en el carrito*/
                         " <form action='pagina.php?ejercicio=ej3_index' method='POST'>".
                         " <input type='hidden' name='comprita' value='".$registro->codigo."'/>".
                         " <input class='white-text green' type = 'submit' name='enviar' value='COMPRAR'>".
                         " </form>"
                         ;     
                ?>
                </section>
            </article>
            
            <?php include 'ej3_carrito.php'; ?>
        </section>
        
        <section class="section center-align"><a  class = "white-text z-depth-1 blue btn" href="pagina.php?ejercicio=ej3_index">Volver</a></section>
        