<?php 
  session_start(); // Inicio de sesión
  try { 
    $baseDatos = "gestisimal";
    $tabla = "productos";
    $conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");
    include 'ej4_administrar_productos.php';
    $url = "pagina.php?ejercicio=ej4";
?>
<section>
  <article class='center-align'>
    <h3>EJERCICIO 4</h3>
      <p>Crea el programa GESTISIMAL (GESTIón SIMplifcada de Almacén) para 
          llevar el control de los artículos de un almacén. De cada artículo se 
          debe saber el código, la descripción, el precio de compra, el precio 
          de venta y el stock (número de unidades). La entrada y salida de 
          mercancía supone respectivamente el incremento y decremento de stock 
          de un determinado artículo. Hay que controlar que no se pueda sacar más 
          mercancía de la que hay en el almacén. El programa debe tener, al 
          menos, las siguientes funcionalidades: listado, alta, baja, 
          modificación, entrada de mercancía y salida de mercancía.
      </p> 
  </article>
</section>
<div class ="divider"></div>
<section>
    <h3  class="center-align blue white-text">GESTISIMAL</h3>
</section>
<section class='container'>
  <article>
    <h4  class="center-align blue white-text">GESTION DE PRODUCTOS</h4>
    <table class="highlight centered">
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
      <tr>
        <form id="alta" action ="#" method ="post">
          <td><input  class = "center-align" type ="text" name ="codigo" value ="<?=$codigoLibre?>" readonly></td>
          <td><input type ="text" name ="descripcion" required></td>
          <td><input type ="number" min = "0" name ="precioCompra" required></td>
          <td><input type ="number" min = "0" name ="precioVenta" required></td>
          <td><input type ="number" min = "0" name ="stock" required></td>
          <td></td>
          <td></td>
          <td></td>
          <td><input class = 'btn green center-align' type = 'submit' name='enviar' value='ALTA'></td> 
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
      <th class ="center-align">MODIFICAR</th><th></th></tr>
      <tr>
        <form id="mod" action ="#" method ="post">        
          <td class="center-align"><input type ="text" name ="codigo" value="<?=$codigo?>"></td>
          <td class="center-align"><input type ="text" name ="descripcion" value="<?=$descripcion?>"></td>
          <td class="center-align"><input type ="number" min = "0"  name ="precioCompra"value="<?=$precioCompra?>"></td>
          <td class="center-align"><input type ="number" min = "0"  name ="precioVenta"value="<?=$precioVenta?>"></td>
          <td class="center-align"><input type ="number" min = "0" name ="stock" value="<?=$stock?>"></td>
          <td class="center-align"><input class = 'btn yellow' type = 'submit' name='enviar' value='MODIFICAR'></td>
        </form>
<?php
    }
?>
        <td></td> 
      </tr>
    </table>
    <table class="highlight centered">
      <tr class = "blue white-text">
        <th class ="center-align">CODIGO</th>
        <th class ="center-align">DESCRIPCION</th>
        <th class ="center-align">PRECIO COMPRA</th>
        <th class ="center-align">PRECIO VENTA</th>
        <th class ="center-align">STOCK</th>
        <th class ="center-align">MOD</th>
        <th class ="center-align">BAJA</th>
        <td colspan= 2 class ="center-align"><b>ENTRADA</b></td>
        <td colspan= 2 class ="center-align"><b>SALIDA</b></td>
      </tr>
      <!--Imprimo los productos-->
<?php
  $consulta =  $conexion->query("SELECT * FROM ".$tabla." ORDER BY codigo LIMIT "
    .(($pagina - 1) * $productosPorPaginas).",".$productosPorPaginas);
  while ($registro = $consulta->fetchObject()){ 
?>
      <tr class="center-align">
        <td class="center-align"><?=$registro->codigo?></td>
        <td class="center-align"><?=$registro->descripcion?></td>
        <td class="center-align"><?=$registro->precioCompra?>€</td>
        <td class="center-align"><?=$registro->precioVenta?>€</td>
        <?php echo "<td class='center-align"; 
          if($registro->stock == 0){echo " red-text";}else if($registro->stock <= 5){echo " purple-text";}
          echo"'>".$registro->stock."</td>";?>
        <form action ="#" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align">
              <input type="submit" class="btn yellow" name ="enviar" value="MOD">
          </td>
        </form>
        <form action ="<?=$url?>_baja" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align">
              <input type="submit" class="btn red" name ="enviar" value="BAJA">
          </td>
        </form>
        <form action ="#" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align">
              <input type="number" min = "0" step= 1 name ="entrada">
          </td>
          <td>
              <input type="submit" class="btn" name ="enviar" value="+">
          </td>
        </form>
        <form action ="#" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align">
              <input type="number" min = "0" step= 1 name ="salida">
          </td>
          <td>
              <input type="submit" class="btn" name ="enviar" value="-">
          </td>
        </form>
      </tr>    
<?php
  }
?>
    </table>
  </article>
</section>
<?php include 'ej4_paginacion.php';?>
<?php 
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 