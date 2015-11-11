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
<link type="text/css" rel="stylesheet" href="css/styleTienda.css"  media="screen,projection"/>
            <article>
                <h3>EJERCICIO 9</h3>
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
                        <li><a class="center-align" href="pagina.php?ejercicio=ej9_AdministradorProductos">GESTIÓN DE PRODUCTOS</a></li>
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
                    echo " <br><img src='".$_SESSION['catalogo'][$codigo]['imagen']."'>".
                         " <br>Codigo: ".$codigo." <br>Nombre:".$_SESSION['catalogo'][$codigo]['nombre'].
                         " <br>Precio: ".$_SESSION['catalogo'][$codigo]['precio']. "€".
                         " <br>Descripción: ".$_SESSION['catalogo'][$codigo]['descripcion'].
                         /*Si se compra el producto se envía el código para meterlo en el carrito*/
                         " <form action='pagina.php?ejercicio=ej9_index' method='POST'>".
                         " <input type='hidden' name='comprita' value='".$codigo."'/>".
                         " <input class='white-text green' type = 'submit' name='enviar' value='COMPRAR'>".
                         " </form>"
                         ;     
                ?>
                </section>
            </article>
            
            <article id = "carrito" class = "col s4">
                <h3 class="center-align white-text blue">CARRITO</h3>
                <section>
                    <article>
                    <?php
                    //Imprimir el carrito
                       if (isset($_SESSION['carrito'])){
                           $total = 0;
                           foreach ($_SESSION['carrito'] as $compra => $unidades) {
                                echo " <article class = 'center-align'>".
                                     " <br><img src='".$_SESSION['catalogo'][$compra]['imagen']."'>".
                                     " <br>Nombre :".$_SESSION['catalogo'][$compra]['nombre'].
                                     " <br>Precio :".$_SESSION['catalogo'][$compra]['precio']. "€".
                                     " <br>Unidades: ".$unidades.
                                     /*Si se elimina el producto se envía el código a arriba y se elimina del carrito*/
                                     " <form action='#' method='POST'>".
                                     " <input type='hidden' name='producto' value='".$codigo."'/>".
                                     " <input type='hidden' name='eliminado' value='".$compra."'/>".
                                     " <input class = 'red white-text'  type = 'submit' name='enviar' value='ELIMINAR'>".
                                     " </form>".
                                     " </article>"
                                     ;
                                $total += $_SESSION['catalogo'][$compra]['precio']*$unidades;
                           }
                           echo "<br><div id ='total'class='center-align blue white-text'>Total: ".$total. " €</div>";
                       }
                    ?>
                    </article>
                </section>
            </article>
        </section>
        
        <section class="section center-align"><a  class = "white-text z-depth-1 blue btn" href="pagina.php?ejercicio=ej9_index">Volver</a></section>
        