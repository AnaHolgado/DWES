<?php 
    session_start(); // Inicio de sesión
    
    if (isset($_POST["enviar"])){//Cuando se compra o elimina se ejecuta este código
        //Si se compra un producto
        if ($_POST['enviar'] == "COMPRAR"){
            $codigoCompra = $_POST['comprita'];//Recojo el código del producto comprado
            /*Si no hay ningún producto introduce el codigo y la unidad se pone 
             * a uno, si ya existe el producto sólo incrementa las unidades.*/
            $_SESSION['carrito'][$codigoCompra]++; 
        }
            
        //Si se elimina se elimina un producto
        if ($_POST['enviar'] == "ELIMINAR"){
            $eliminado = $_POST['eliminado'];
            unset($_SESSION['carrito'][$eliminado]);
        }
    } 
    if(!isset($_COOKIE['carrito'])){
        $_SESSION['catalogo'] = ["COD01" => ["nombre" => "gato", "descripcion" => "felino 4 patas", "precio" => 600, "imagen" => "images/gato.png" , "unidades" => 0],
                            "COD02" => ["nombre" => "perro", "descripcion" => "animal 4 patas", "precio" => 100, "imagen" => "images/perro.png"],
                            "COD03" => ["nombre" => "conejo", "descripcion" => "roedor de orejas largas", "precio" => 50, "imagen" => "images/conejo.png"]
        ];
    }else {
        $_SESSION['catalogo'] = unserialize($_COOKIE['carrito']);
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
                <section class="row">
                <?php
                    //Imprimo el catálogo
                    foreach ($_SESSION['catalogo'] as $key => $value) {
                        echo " <article class = 'col s4 row center-align'>".
                             " <br><img src='".$value['imagen']."'>".
                             " <br><p>Codigo: ".$key.
                             " <br>Nombre:".$value['nombre'].
                             " <br>Precio: ".$value['precio']. "€</p>".
                             /*Si se compra el producto se envía el código para meterlo en el carrito*/
                             " <form class = 'col s6' action='#' method='POST'>".
                             " <input type='hidden' name='comprita' value='".$key."'/>".
                             " <input class = 'green white-text' type = 'submit' name='enviar' value='COMPRAR'>".
                             " </form>".
                             " <form class = 'col s6' action='pagina.php?ejercicio=ej9_detalle' method='POST'>".
                             " <input type='hidden' name='producto' value='".$key."'/>".
                             " <input class = 'blue white-text' type = 'submit' name='enviar' value='DETALLE'>".
                             " </form>".
                             " </article>"
                            ;     
                    }
                ?>
                </section>
            </article>
            <article id = "carrito" class = "col s4">
                <h3 class="center-align blue white-text">CARRITO</h3>
                <section class="center-align">
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
                                     " <input type='hidden' name='eliminado' value='".$compra."'/>".
                                     " <input class = 'red white-text'  type = 'submit' name='enviar' value='ELIMINAR'>".
                                     " </form>".
                                     "</article>"
                                     ;
                                $total += $_SESSION['catalogo'][$compra]['precio']*$unidades;
                           }
                           echo "<br><div id ='total'class='center-align blue white-text'>Total: ".$total. " €</div>";
                       }
                    ?>
                </section>
            </article>
        </section>
