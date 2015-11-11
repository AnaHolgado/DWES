<?php 
    session_start(); // Inicio de sesión
    
    if(!isset($_COOKIE['carrito'])){
        $_SESSION['catalogo'] = ["COD01" => ["nombre" => "gato", "descripcion" => "felino 4 patas", "precio" => 600, "imagen" => "images/gato.png" , "unidades" => 0],
                            "COD02" => ["nombre" => "perro", "descripcion" => "animal 4 patas", "precio" => 100, "imagen" => "images/perro.png"],
                            "COD03" => ["nombre" => "conejo", "descripcion" => "roedor de orejas largas", "precio" => 50, "imagen" => "images/conejo.png"]
        ];
    }else {
        $_SESSION['catalogo'] = unserialize($_COOKIE['carrito']);
    }
    //Si se elimina se elimina un producto
        if ($_POST['enviar'] == "BAJA"){
            $codigo = $_POST['codigo'];
            unset($_SESSION['catalogo'][$codigo]);
            
        }
        if ($_POST['enviar'] == "ALTA" || $_POST['enviar'] == "MODIFICAR"){
            $_SESSION['catalogo'][$_POST['codigo']]['nombre'] = $_POST['nombre'];
            $_SESSION['catalogo'][$_POST['codigo']]['descripcion'] = $_POST['descripcion'];
            $_SESSION['catalogo'][$_POST['codigo']]['precio'] = $_POST['precio'];   
            $_SESSION['catalogo'][$_POST['codigo']]['imagen'] = "images/".$_POST['imagen']; 
        }
        
        
        if ($_POST['enviar'] == "MODIFICACION"){
            $producto = $_POST['codigo'];
            $nombre = $_SESSION['catalogo'][$producto]['nombre'];
            $precio = $_SESSION['catalogo'][$producto]['precio'];
            $descripcion = $_SESSION['catalogo'][$producto]['descripcion'];
            $imagen = $_SESSION['catalogo'][$producto]['imagen'];
        }
        $catalogo = serialize($_SESSION['catalogo']);
        setcookie("carrito",$catalogo, time() + 100*24*3600);
?>
<link type="text/css" rel="stylesheet" href="css/styleTienda.css"  media="screen,projection"/>
<article>
                <h3>Ejercicio 9</h3>
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
        <section class='container'>
            <article>
                <h4 class="blue-text center-align">GESTION DE PRODUCTOS</h4>
                <table class="highlight centered">
                    <tr class = "blue white-text"><th class ="center-align">IMAGEN</th><th class ="center-align">CÓDIGO</th><th class ="center-align">NOMBRE</th><th class ="center-align">DESCRIPCIÓN</th><th class ="center-align">PRECIO</th>
                
                <?php
                    if ($_POST['enviar']!= "MODIFICACION"){
                ?>
                    <th class ="center-align">ALTA</th></tr>
                    <tr>
                <form id="alta" action ="#" method ="post">
                    <input type ="hidden" name ="codigo" value="<?php echo"COD0".(count($_SESSION['catalogo'])+1)?>"><br>
                    <td><input type ="file" name ="imagen"></td>
                    <td><?php echo"COD0".(count($_SESSION['catalogo'])+1)?></td>
                    <td><input type ="text" name ="nombre"></td>
                    <td><input type ="text" name ="descripcion"></td>
                    <td><input type ="number" min ="0" name ="precio"></td>
                    <td><input class = 'btn green' type = 'submit' name='enviar' value='ALTA'></td>
                </form>
                <?php 
                    } else {
                        echo "<p>".$_SESSION['catalago'][$_POST['producto']]['nombre']."</p>";
                ?>
                    <th class ="center-align">MODIFICAR</th></tr>
                <tr>
                <form id="mod" action ="#" method ="post">
                    <td><?php echo "<p>".$imagen."</p><br>";?><input type ="file" name ="imagen" value=<?=$imagen?>></td>
                    <td><?php echo "<p>".$producto."</p><br>";?></td>
                    <input type='hidden' name='codigo' value=<?=$producto?>>
                    <td><input type ="text" name ="nombre" value=<?=$nombre?>></td>
                    <td><input type ="text" name ="descripcion" value=<?=$descripcion?>></td>
                    <td><input type ="number" min ="0" name ="precio"value=<?=$precio?>></td>
                    <td><input class = 'btn yellow' type = 'submit' name='enviar' value='MODIFICAR'></td>
                </form>
                <?php
                    }
                    ?></tr>
                </table>
                <table class="highlight centered">
                    <tr class = "blue white-text"><th class ="center-align">IMAGEN</th><th class ="center-align">CÓDIGO</th><th class ="center-align">NOMBRE</th><th class ="center-align">DESCRIPCIÓN</th><th class ="center-align">PRECIO</th><th class ="center-align">BAJA</th><th class ="center-align">MODIFICACIÓN</th></tr>
                <?php
                    //Imprimo el catálogo
                    foreach ($_SESSION['catalogo'] as $key => $value) {
                        echo "<tr>".
                             " <td><img src='".$value['imagen']."'></td>".
                             " <td>".$key."</td>".
                             " <td>".$value['nombre']."</td>".
                             " <td>".$value['descripcion']."</td>".
                             " <td>".$value['precio']. "€</td>".
                             " <form action='#' method='POST'>".
                             " <input type='hidden' name='codigo' value='".$key."'/>".
                             " <td><input class='btn red'type = 'submit' name='enviar' value='BAJA'>"."</td>".
                             " <td><input class='btn yellow'type = 'submit' name='enviar' value='MODIFICACION'>"."</td>".
                             " </form>".
                             " </tr>"
                            ;     
                    }
                ?>
                </table>
            </article>
            </section>
        
        <section class="section center-align"><a  class = "white-text z-depth-1 blue btn" href="pagina.php?ejercicio=ej9_index">Volver</a></section>
        
        