<?php 
  $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
  
  $codigo = $_POST['dni'];
  $consulta =  $conexion->query("SELECT * FROM cliente WHERE dni='$codigo'");
  $registro = $consulta->fetchObject();
  $codigo = $registro->dni;
  $precioCompra =  $registro->nombre;
  $descripcion =  $registro->direccion;
  $precioVenta =  $registro->telefono;
?>
<div class ="divider"></div>
<section class='container'>
  <article>
    <h4 class="red-text center-align">CONFIRMACIÓN BAJA</h4>
    <h5 class="red-text center-align">¿Desea borrar el siguiente cliente?</h5>
    <table class="highlight centered">
      <tr class = "blue white-text">
          <th class ="center-align">DNI</th>
          <th class ="center-align">NOMBRE</th>
          <th class ="center-align">DIRECCIÓN</th>
          <th class ="center-align">TELEFONO</th>
          <th class ="center-align">BAJA</th><th></th></tr>
      <tr>
      
        <form id="mod" action ="pagina.php?ejercicio=ej2_index" method ="post">
            <td><input type ="text" name ="dni" value="<?=$codigo?>" readonly></td>
            <td><input type ="text" name ="nombre" value="<?=$precioCompra?>" readonly></td>
            <td><input type ="text" name ="direccion" value="<?=$descripcion?>" readonly></td>
            <td><input type ="text"  name ="telefono"value="<?=$precioVenta?>" readonly></td>
            <td><input class = 'btn red' type = 'submit' name='enviar' value='BAJA'></td>
        </form>
      <td></td> 
    </tr>
  </table>
</article>
</section>
