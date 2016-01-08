<?php 
  session_start(); // Inicio de sesión
  try { 
    $baseDatos = "gestisimal";
    $tabla = "productos";
    $conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");
    include 'ej5_administrar_productos.php';
    $url = "pagina.php?ejercicio=ej5_venta";
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
<section>
  <h4  class="center-align white-text"><a class ="btn btn-large green" href="pagina.php?ejercicio=ej5_gestisimal">GESTISIMAL</a></h4>
</section>
<section>
  <article class="container row">
    <section class="col s8">
      <h4  class="center-align blue white-text">VENTA</h4>
      <table class="highlight centered">
        <tr class = "blue white-text">
          <th class ="center-align">CODIGO</th>
          <th class ="center-align">DESCRIPCION</th>
          <th class ="center-align">PRECIO VENTA</th>
          <th class ="center-align">STOCK</th>
          <td colspan= 2 class ="center-align"><b>VENTA</b></td>
        </tr>
      <!--Imprimo los productos-->
<?php
  $consulta =  $conexion->query("SELECT * FROM ".$tabla." ORDER BY codigo LIMIT "
    .(($pagina - 1) * $productosPorPaginas).",".$productosPorPaginas);
  while ($registro = $consulta->fetchObject()){ 
?>
        <!--<tr class="center-align">-->
      <?php echo "<tr"; 
            if($registro->stock == 0){echo " class='red'";}else if($registro->stock <= 5){echo " class='orange'";}
            echo ">";?>
          <td class="center-align"><?=$registro->codigo?></td>
          <td class="center-align"><?=$registro->descripcion?></td>
          <td class="center-align"><?=number_format($registro->precioVenta,2)?>€</td>
          <td class="center-align"><?=$registro->stock?> uds.</td>
          <form action ="#" method ="post">
            <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
            <td><input class="center-align" type="number" min = "1" step= 1 name ="salida"></td>
            <td><button type="submit" class="btn-floating" name ="venta" value="-"><i class="material-icons">add_shopping_cart</i></button></td>
          </form>
        </tr>    
<?php
  }
?>
      </table>
<?php include 'ej5_paginacion.php';?>
    </section>
    <section class="col s4">
<?php include "ej5_carrito.php" ?>
    </section>
  </article>
  
</section>

<?php 
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 