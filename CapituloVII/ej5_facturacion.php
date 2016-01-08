<?php 
  session_start(); // Inicio de sesión
  try { 
    $baseDatos = "gestisimal";
    $tabla = "productos";
    $conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");
    $url = "pagina.php?ejercicio=ej5";
?>
<section>
  <article class='center-align'>
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
<section>
    <h3  class="center-align blue white-text">GESTISIMAL</h3>
</section>
<section>
  <article class="container">
    <section>
      <h4  class="center-align blue white-text">FACTURA</h4>
      <table class="highlight centered">
        <tr class = "blue white-text">
            <th class ="center-align">CODIGO</th>
            <th class ="center-align">DESCRIPCION</th>
            <th class ="center-align">PRECIO</th>
            <th class ="center-align">UNIDADES</th>
            <th class ="center-align">TOTAL</th>
            <th class ="center-align">I.V.A.</th>
            <th class ="center-align">TOTAL I.V.A.</th>
        </tr>
<?php
foreach ($_SESSION['carrito'] as $compra => $unidades) {
  $consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo = '$compra'");
  $registro = $consulta->fetchObject();
?>
        <tr>
          <td><?=$registro ->codigo?></td>
          <td><?=$registro ->descripcion?></td>
          <td><?=number_format($registro ->precioVenta,2). "€"?></td>
          <td><?=$unidades?> uds.</td>
          <td><?=number_format($registro ->precioVenta*$unidades,2)?>€</td>
          <td><?=number_format($registro ->precioVenta*$unidades*.21,2)?>€</td>
          <td><?=number_format($registro ->precioVenta*$unidades*1.21,2)?>€</td>
        </tr>
<?php 
//Sumo los precios para saber el total
$total += ($registro ->precioVenta)*$unidades;
$totalUnidades+= $unidades;  
//Descuento las unidades del stock de la base de datos
$stock = $registro->stock;
$stock -= $unidades;
if ($stock == 0){
  echo '<script type="text/javascript">alert("Se ha quedado sin existencias del producto '.$compra.', debe reponer el producto.");</script>';
}
$consulta = "UPDATE ".$tabla." SET stock ='$stock' WHERE codigo = '$compra'";
$conexion->query($consulta);
//Elimino el producto del carrito
unset($_SESSION['carrito'][$compra]);
}?>
    </table>
      <?php
      if($_SESSION['descuento'] != 1){
      ?>
      <section class="right-align"><h4 class="right-align chip">DESCUENTO <?=$_SESSION['descuento']*100?>%</h4></section>
      <?php
      }
      ?>
      <section class="right-align">TOTAL SIN I.V.A.: <?=number_format($total*$_SESSION['descuento'],2)?>€</section>
      <div class="divider"></div>
      <table>
       <tr>
           <td class="right-align">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td class="right-align">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td class="right-align">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td class="right-align">Productos: <?=$totalUnidades?> uds. </td>
           <td class="right-align">&nbsp;</td>
           <td class="right-align">I.V.A.(21%): <?=number_format($total*(1-$_SESSION['descuento'])*0.21,2)?>€</td>
           <td class="right-align"> Total con I.V.A: <?= number_format($total*(1-$_SESSION['descuento'])*1.21,2)?>€</td>
       </tr>
      </table>
      </article>
</section>
<section><article class="center-align"><a class="btn blue" href="<?=$url?>_venta">VOLVER</a></article></section>

<?php 
  //limpio el descuento para la proxima sesión
  $_SESSION['descuento'] = 1;
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 