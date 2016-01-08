<?php 
  $conexion->select_db("banco"); 
  $conexion->set_charset("utf8");
  
    if($_POST['enviar'] == "ALTA"){
      $codigo = $_POST['dni'];
      $precioCompra = $_POST['nombre'];
      $descripcion = $_POST['direccion'];
      $precioVenta = $_POST['telefono'];
       $conexion->query("INSERT INTO cliente VALUES ('$codigo','$precioCompra','$descripcion','$precioVenta')"); 
    } 
    if($_POST['enviar'] == "BAJA"){
      $codigo = $_POST['dni'];
      $consulta = "DELETE FROM cliente WHERE dni = '$codigo'";
      $conexion->query("DELETE FROM cliente WHERE dni = '$codigo'"); 
      echo $consulta;
      echo round(3.33, 0, 'PHP_ROUND_HALF_UP');
    } 
    if($_POST['enviar'] == "MODIFICAR"){
      $dniAntiguo = $_POST['dniAntiguo'];
      $codigo = $_POST['dni'];
      $precioCompra = $_POST['nombre'];
      $descripcion = $_POST['direccion'];
      $precioVenta = $_POST['telefono'];
      $consulta = "UPDATE cliente SET dni ='$codigo', nombre ='$precioCompra', direccion='$descripcion', telefono='$precioVenta'"
          . " WHERE dni = '$dniAntiguo'";
       $conexion->query($consulta);
      echo $consulta;
    } 
?>
<section class="container">
  <article>
    <h3 class="center-align">Ejercicio 1</h3>
    <p> Crea una aplicación web que permita hacer listado, alta, baja y modificación 
        sobre la tabla cliente de la base de datos banco.
        <br>• Para realizar el listado bastará un SELECT, tal y como se ha visto en los 
        ejemplos. 
        <br>• El alta se realizará mediante un formulario donde se especificarán todos 
        los campos del nuevo registro. Luego esos datos se enviarán a una página 
        que ejecutará INSERT. 
        <br>• Para realizar una baja, se pedirá el DNI del cliente mediante un 
        formulario y a continuación se ejecutará DELETE para borrar el registro 
        cuyo DNI coincida con el introducido. 
        <br>• La modificación se realiza mediante UPDATE. Se pedirá previamente en un 
        formulario el DNI del cliente para el que queremos modificar los datos.
    </p>
  </article>
</section>
<div class ="divider"></div>
<section class='container'>
  <article>
    <h4 class="blue-text center-align">GESTION DE CLIENTES</h4>
    <table class="highlight centered">
      <tr class = "blue white-text">
          <th class ="center-align">DNI</th>
          <th class ="center-align">NOMBRE</th>
          <th class ="center-align">DIRECCIÓN</th>
          <th class ="center-align">TELEFONO</th>
        <?php
            if ($_POST['enviar']!= "MODIFICACION"){
        ?>
          <th class="center-align">ALTA</th><th></th></tr>
      <tr>
        <form id="alta" action ="#" method ="post">
            <td><input type ="text" name ="dni"></td>
            <td><input type ="text" name ="nombre"></td>
            <td><input type ="text" name ="direccion"></td>
            <td><input type ="text" name ="telefono"></td>
            <td><input class = 'btn green center-align' type = 'submit' name='enviar' value='ALTA'></td> 
        </form>
      
      <?php 
          } else {
              $codigo = $_POST['dni'];
              $consulta =  $conexion->query("SELECT * FROM cliente WHERE dni='$codigo'");
              $registro = $consulta->fetch_object();
              
              $codigo = $registro->dni;
              $precioCompra =  $registro->nombre;
              $descripcion =  $registro->direccion;
              $precioVenta =  $registro->telefono;
      ?>
      <th class ="center-align">MODIFICAR</th><th></th></tr>
      <tr>
        <form id="mod" action ="#" method ="post">
            <input type ="hidden" name ="dniAntiguo" value="<?=$codigo?>">
            <td><input type ="text" name ="dni" value="<?=$codigo?>"></td>
            <td><input type ="text" name ="nombre" value="<?=$precioCompra?>"></td>
            <td><input type ="text" name ="direccion" value="<?=$descripcion?>"></td>
            <td><input type ="text"  name ="telefono"value="<?=$precioVenta?>"></td>
            <td><input class = 'btn yellow' type = 'submit' name='enviar' value='MODIFICAR'></td>
        </form>
      <?php
          }
      ?>
      <td></td> 
    </tr>
    <tr class = "blue white-text">
        <th class ="center-align">DNI</th>
        <th class ="center-align">NOMBRE</th>
        <th class ="center-align">DIRECCIÓN</th>
        <th class ="center-align">TELEFONO</th>
        <th class ="center-align">MODIFICACIÓN</th>
        <th class ="center-align">BAJA</th>
    </tr>
    <!--Imprimo el clientes-->
    <?php
      $consulta =  $conexion->query("SELECT * FROM cliente");
      while ($registro =  $consulta->fetch_object()){ 
    ?>
    <tr>
        <td><?=$registro->dni?></td>
        <td><?=$registro->nombre?></td>
        <td><?=$registro->direccion?></td>
        <td><?=$registro->telefono?></td>
        <form id="mod" action ="#" method ="post">
          <input type="hidden" name="dni" value=<?=$registro->dni?>>
          <td><input type="submit" class="btn yellow" name ="enviar" value="MODIFICACION"></td>
          <td><input type="submit" class="btn red" name ="enviar" value="BAJA"></td>
        </form>
    </tr>    
    <?php
      }
    ?>
  </table>
</article>
</section>