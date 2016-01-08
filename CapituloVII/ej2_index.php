<?php 
  session_start(); // Inicio de sesión
  try { 
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    //Paginación
    if (!isset($_GET['pagina'])){
      $pagina= 1;
    } else{
      $pagina = $_GET['pagina'];
    }
    $consulta =  $conexion->query("SELECT * FROM cliente");
    $numProductos = $consulta->rowCount();
    $numPaginas = floor(abs($numProductos - 1) / 5) + 1;
    //Fin Paginación
  
    if($_POST['enviar'] == "ALTA"){
      $codigo = $_POST['dni'];
      $precioCompra = $_POST['nombre'];
      $descripcion = $_POST['direccion'];
      $precioVenta = $_POST['telefono'];
      
      // Si el DNI introducido ya existe en la BBDD, se muestra una ventana indicando el error.
      $consulta =  $conexion->query("SELECT * FROM cliente WHERE dni='$codigo'");
      $existe = $consulta->fetchObject();
      if ($existe) {
        echo '<script type="text/javascript">alert("Lo siento, ese DNI ya existe en la base de datos");</script>';
      } else { // Si el DNI no existe, se insertan todos los datos del cliente en la BBDD.
          $conexion->query("INSERT INTO cliente VALUES ('$codigo','$precioCompra','$descripcion','$precioVenta')");
      }
    } 
    if($_POST['enviar'] == "BAJA"){
      $codigo = $_POST['dni'];
      $consulta = "DELETE FROM cliente WHERE dni = '$codigo'";
      $conexion->query($consulta); 
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
    } 
?>
<section class="container">
  <article>
    <h3 class="center-align">Ejercicio 2</h3>
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
              $registro = $consulta->fetchObject();
              
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
      $consulta =  $conexion->query("SELECT * FROM cliente ORDER BY nombre LIMIT ".(($pagina - 1) * 5).", 5");
      while ($registro = $consulta->fetchObject()){ 
    ?>
    <tr>
        <td><?=$registro->dni?></td>
        <td><?=$registro->nombre?></td>
        <td><?=$registro->direccion?></td>
        <td><?=$registro->telefono?></td>
        <form name=modificar action ="#" method ="post">
          <input type="hidden" name="dni" value=<?=$registro->dni?>>
          <td><input type="submit" class="btn yellow" name ="enviar" value="MODIFICACION"></td>
        </form>
        <form name=borrado action ="pagina.php?ejercicio=ej2_baja" method ="post">
          <input type="hidden" name="dni" value=<?=$registro->dni?>>
          <td><input type="submit" class="btn red" name ="enviar" value="BAJA"></td>
        </form>
    </tr>    
    <?php
      }
    ?>
  </table>
</article>
<article>
  <ul class="pagination center-align">
    <?php
//Paginación
    //Chevron primera página
    echo '<li class="blue lighten-5"><a href="pagina.php?ejercicio=ej2_index&pagina='.(1).'"><i class="material-icons">skip_previous</i></a></li> ';
    //Chevron izquierdo
    echo '<li class="blue lighten-5 ';
    if($pagina == 1){ 
      echo 'disabled';
    }
    echo '"><a href="pagina.php?ejercicio=ej2_index&pagina='.($pagina-1).'"><i class="material-icons">chevron_left</i></a></li> ';
    //Paginado por números
      if($pagina+3 > $numPaginas){
        $paginaUltima = $numPaginas;
      } else {
        $paginaUltima = $pagina+2;
      }
      if($pagina > $numPaginas -3){
        $paginaPrimera = $numPaginas - 2;
      } else {
        $paginaPrimera = $pagina;
      }
    for ($i = $paginaPrimera; $i <= $paginaUltima ; $i++){
      echo '<li class="waves-effect';
      if ($pagina == $i){
        echo 'active blue';
      } 
      echo '"><a href=pagina.php?ejercicio=ej2_index&pagina='.$i.'>'.$i.'</a></li>';  
    }//fin for
    //Chevron derecho
    echo '<li class="blue lighten-5';
    if($pagina == $numPaginas){ echo ' disabled';}
    echo '"><a href="pagina.php?ejercicio=ej2_index&pagina='.($pagina+1).'"><i class="material-icons">chevron_right</i></a></li> ';
    //Chevron primera página
    echo '<li class="blue lighten-5"><a href="pagina.php?ejercicio=ej2_index&pagina='.($numPaginas).'"><i class="material-icons">skip_next</i></a></li>';
//Fin Paginación
    ?>
  </ul>
</article>
</section>

<?php 
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 