<?php 
  $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
  
  $codigo = $_POST['codigo'];
  $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo='$codigo'");
  $registro = $consulta->fetchObject();
  $imagen = $registro->imagen;
  $codigo = $registro->codigo;
  $precioCompra =  $registro->nombre;
  $descripcion =  $registro->descripcion;
  $precioVenta =  $registro->precio;
?>
<div class ="divider"></div>
<section class='container'>
  <article>
    <h4 class="red-text center-align">CONFIRMACIÓN BAJA</h4>
    <h5 class="red-text center-align">¿Desea borrar el siguiente cliente?</h5>
    <table class="highlight centered">
      <tr class = "blue white-text">
          <th class ="center-align">IMAGEN</th>
          <th class ="center-align">CODIGO</th>
          <th class ="center-align">NOMBRE</th>
          <th class ="center-align">DESCRIPCIÓN</th>
          <th class ="center-align">PRECIO</th>
          <th class ="center-align">BAJA</th><th></th></tr>
      <tr>
      
        <form id="mod" action ="pagina.php?ejercicio=ej3_administrar_productos" method ="post">
            <td class="center-align"><img width= "50px" src='images/<?=$imagen?>'></td>
            <td class="center-align"><input type="text" name="codigo" value="<?=$codigo?>"readonly></td>
            <td class="center-align"><?=$precioCompra?></td>
            <td class="center-align"><?=$descripcion?></td>
            <td class="center-align"><?=$precioVenta?>€</td>
            <td class="center-align"><input class = 'btn red' type = 'submit' name='enviar' value='BAJA'></td>
        </form>
      <td></td> 
    </tr>
  </table>
</article>
</section>
