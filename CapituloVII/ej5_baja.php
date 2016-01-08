<?php 
  $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  
  $url = "pagina.php?ejercicio=ej5_gestisimal";
  $codigo = $_POST['codigo'];
  $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo='$codigo'");
  $registro = $consulta->fetchObject();
  $stock = $registro->stock;
  $codigo = $registro->codigo;
  $precioCompra =  $registro->precioCompra;
  $descripcion =  $registro->descripcion;
  $precioVenta =  $registro->precioVenta;
?>
<div class ="divider"></div>
<section class='container'>
  <article>
    <h4 class="red-text center-align">CONFIRMACIÓN BAJA</h4>
    <h5 class="red-text center-align">¿Desea borrar el siguiente cliente?</h5>
    <table class="highlight centered">
      <tr class = "blue white-text">
          <th class ="center-align">CODIGO</th>
          <th class ="center-align">DESCRIPCIÓN</th>
          <th class ="center-align">PRECIO COMPRA</th>
          <th class ="center-align">PRECIO VENTA</th>
          <th class ="center-align">PRECIO STOCK</th>
          <th class ="center-align">BAJA</th>
          <th class ="center-align">MANTENER</th>
      </tr>
      <tr>
        <form id="mod" action ="<?=$url?>" method ="post">
            <td><input  class="center-align" type="text" name="codigo" value=<?=$codigo?> readonly></td>
            <td class="center-align"><?=$descripcion?></td>
            <td class="center-align"><?=$precioCompra?>€</td>
            <td class="center-align"><?=$precioVenta?>€</td>
            <td class="center-align"><?=$stock?></td>
            <td class="center-align">
                <input class = 'btn red' type = 'submit' name='enviar' value='BAJA'>
            </td>
            <td class="center-align">
                <input class = 'btn green' type = 'submit' name='enviar' value='MANTENER'>
            </td>
        </form>
    </tr>
  </table>
</article>
</section>
