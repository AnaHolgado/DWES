<?php 
  session_start(); // Inicio de sesión
  try { 
    $baseDatos = "gestisimal";
    $tabla = "productos";
    $conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");
    include 'ej5_administrar_productos.php';
    $url = "pagina.php?ejercicio=ej5_gestisimal";
?>
<section>
  <article class='center-align container'>
    <h3>EJERCICIO 5</h3>
      <p>Modifica el programa anterior añadiendo las siguientes mejoras:
        <br>• Comprueba la existencia del código en el alta, la baja y la 
        de artículos para evitar errores. 
        <br>• Cambia la opción “Salida de stock” por “Venta”. Esta nueva opción 
        permitirá hacer una venta de varios artículos y emitir la factura 
        correspondiente. Se debe preguntar por los códigos y las cantidades de 
        cada artículo que se quiere comprar. Aplica un 21% de IVA.
      </p> 
  </article>
</section>
<div class ="divider"></div>
<section><!--Boton de Venta-->
    <h4  class="center-align white-text"><a class ="btn btn-large green"  href="pagina.php?ejercicio=ej5_venta">VENTA</a></h4>
</section>
<section>
  <article>
    <section class ="container">
      <h4  class="center-align blue white-text">GESTISIMAL</h4>
      <table class="highlight centered"><!--Tabla para modificar o dar de alta productos la de listado está en la línea 88-->
        <tr class = "blue white-text">
            <th class ="center-align">CODIGO</th>
            <th class ="center-align">DESCRIPCION</th>
            <th class ="center-align">PRECIO COMPRA</th>
            <th class ="center-align">PRECIO VENTA</th>
            <th class ="center-align">STOCK</th>
<?php
    if ($_POST['enviar']!= "MOD"){
?>
            <th></th><th></th><th></th>
            <th class="center-align">ALTA</th>
        </tr>
        <tr><!--Tabla de alta-->
          <form id="alta" action ="#" method ="post">
            <td><input  class = "center-align" type ="text" name ="codigo" value ="<?=$codigoLibre?>" readonly></td>
            <td><input type ="text" name ="descripcion" required></td>
            <td><input type ="number" min = "0" name ="precioCompra" required></td>
            <td><input type ="number" min = "0" name ="precioVenta" required></td>
            <td><input type ="number" min = "0" name ="stock" required></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button class = 'btn-floating  btn-large green center-align' type = 'submit' name='enviar' value='ALTA'><i class="material-icons">check</i></button></td> 
          </form>
<?php 
    } else {
        $codigo = $_POST['codigo'];
        $consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo='$codigo'");
        $registro = $consulta->fetchObject();

        $stock = $registro->stock;
        $codigo = $registro->codigo;
        $precioCompra =  $registro->precioCompra;
        $descripcion =  $registro->descripcion;
        $precioVenta =  $registro->precioVenta;
?>
      <th></th><th></th><th></th><th class ="center-align">MODIFICAR</th></tr>
      <tr>
        <form id="mod" action ="#" method ="post">        
          <td class="center-align"><input type ="text" name ="codigo" value="<?=$codigo?>"></td>
          <td class="center-align"><input type ="text" name ="descripcion" value="<?=$descripcion?>"></td>
          <td class="center-align"><input type ="number" min = "0"  name ="precioCompra"value="<?=$precioCompra?>"></td>
          <td class="center-align"><input type ="number" min = "0"  name ="precioVenta"value="<?=$precioVenta?>"></td>
          <td class="center-align"><input type ="number" min = "0" name ="stock" value="<?=$stock?>"></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="center-align"><button class = 'btn-floating btn-large yellow' type = 'submit' name='enviar' value='MODIFICAR'><i class="material-icons">mode_edit</i></button></td>
        </form>
<?php
    }
?>
          
        </tr>
      </table><!--Tabla de listado-->
      <table class="highlight centered">
          <form action="#" method="POST">
        <tr class = "blue white-text">
          <th class ="center-align">CODIGO<button class ="btn-flat btn-floating" type=submit name ="orden" value="codigo"><i class="material-icons">swap_vertical_circle</i></button></th>
          <th class ="center-align">DESCRIPCION<button class ="btn-flat btn-floating" type=submit name ="orden" value="descripcion"><i class="material-icons">swap_vertical_circle</i></button></th>
          <th class ="center-align">PRECIO_COMPRA<button class ="btn-flat btn-floating" type=submit name ="orden" value="precioCompra"><i class="material-icons">swap_vertical_circle</i></button></th>
          <th class ="center-align">PRECIO_VENTA<button class ="btn-flat btn-floating" type=submit name ="orden" value="precioVenta"><i class="material-icons">swap_vertical_circle</i></button></th>
          <th class ="center-align">STOCK<button class ="btn-flat btn-floating" type=submit name ="orden" value="stock"><i class="material-icons">swap_vertical_circle</i></button></th>
          <th class ="center-align">MOD</th>
          <th class ="center-align">BAJA</th>
          <td colspan= 2 class ="center-align"><b>ENTRADA</b></td>
          <td colspan= 2 class ="center-align"><b>SALIDA</b></td>
        </tr>
          </form>
      <!--Imprimo los productos-->
<?php
/*
if($_SESSION['orden'] == $_POST['orden']){
  if ($_SESSION['booleano']){
    $_SESSION['desc'] = "DESC";
    $_SESSION['booleano'] = false;
  }else {
    $_SESSION['desc'] = "ASC";
    $_SESSION['booleano'] = true;
  }
} else {
  $_SESSION['desc'] = "ASC";
  $_SESSION['booleano'] = true;
}
if(!isset($_SESSION['orden'])){
  $_SESSION['orden'] = "codigo";
  $_SESSION['desc'] = "ASC";
  $_SESSION['booleano'] = true;
}else if (isset ($_POST['orden'])){
  $_SESSION['orden'] = $_POST['orden'];
}*/

if($_SESSION['orden'] == $_POST['orden']){
  if ($_SESSION['desc']== "ASC"){
    $_SESSION['desc'] = "DESC";
  }else {
    $_SESSION['desc'] = "ASC";
  }
} else {
  $_SESSION['desc'] = "ASC";
}
if(!isset($_SESSION['orden'])){
  $_SESSION['orden'] = "codigo";
  $_SESSION['desc'] = "ASC";
}else if (isset ($_POST['orden'])){
  $_SESSION['orden'] = $_POST['orden'];
}

$consulta =  $conexion->query("SELECT * FROM ".$tabla." ORDER BY ".$_SESSION['orden']." ".$_SESSION['desc']." LIMIT "
    .(($pagina - 1) * $productosPorPaginas).",".$productosPorPaginas);
  while ($registro = $consulta->fetchObject()){ 
?>
        <!--<tr class="center-align">-->
      <?php echo "<tr"; //Cambio de color la fila dependiendo del stock
            if($registro->stock == 0){echo " class='red'";}else if($registro->stock <= 5){echo " class='orange'";}
            echo ">";?>
          <td class="center-align"><?=$registro->codigo?></td>
          <td class="center-align"><?=$registro->descripcion?></td>
          <td class="center-align"><?=number_format($registro->precioCompra,2)?>€</td>
          <td class="center-align"><?=number_format($registro->precioVenta,2)?>€</td>
          <td class="center-align"><?=$registro->stock?>uds.</td>
          <form action ="#" method ="post"><!--Boton Modificar-->
            <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
            <td class="center-align"><button type="submit" class="btn-floating btn-large yellow" name ="enviar" value="MOD"><i class="material-icons">mode_edit</i></button></td>
          </form>
          <form action ="pagina.php?ejercicio=ej5_baja" method ="post">
            <input type="hidden" name="codigo" value=<?=$registro->codigo?>><!--Boton Baja-->
            <td class="center-align"><button type="submit" class="btn-floating btn-large red" name ="enviar" value="BAJA"><i class="material-icons">delete</i></button></td>
          </form>
          <form action ="#" method ="post"><!--Input para meter más mercancia-->
            <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
            <td class="center-align"><input type="number" min = "1" step= 1 name ="entrada"></td>
            <td><button type="submit" class="btn-floating btn-large" name ="enviar" value="+">+</button></td>
          </form>
          <form action ="#" method ="post"><!--Input para sacar más mercancias-->
            <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
            <td class="center-align"><input type="number" min = "1" step= 1 name ="salida"></td>
            <td><button type="submit" class="btn-floating btn-large" name ="enviar" value="-">-</button></td>
          </form>
        </tr>    
<?php
  }
?>
      </table>
<?php include 'ej5_paginacion.php';?>
    </section>
  </article>
  
</section>

<?php 
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 