<?php 
  session_start(); // Inicio de sesión
  try { 
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
    
    if($_POST['enviar'] == "ALTA"){
      $codigo = $_POST['codigo'];
      $imagen = $_POST['imagen'];
      $precioCompra = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precioVenta = $_POST['precio'];
      
      $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo='$codigo'");
      $existe = $consulta->fetchObject();
     
      $conexion->query("INSERT INTO productos VALUES ('$imagen','$codigo','$nombre','$descripcion','$precio')");
    } 
    if($_POST['enviar'] == "BAJA"){
      $codigo = $_POST['codigo'];
      $consulta = "DELETE FROM productos WHERE codigo = '$codigo'";
      $conexion->query($consulta); 
    } 
    if($_POST['enviar'] == "MODIFICAR"){
      $imagen = $_POST['imagen'];
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $consulta = "UPDATE productos SET imagen ='$imagen', nombre ='$nombre', descripcion='$descripcion', precio='$precio'"
          . " WHERE codigo = '$codigo'";
      $conexion->query($consulta);
    } 
    //Paginación
    if (!isset($_GET['pagina'])){
      $pagina= 1;
    } else{
      $pagina = $_GET['pagina'];
    }
    $consulta =  $conexion->query("SELECT * FROM productos");
    $numProductos = $consulta->rowCount();
    $numPaginas = floor(abs($numProductos - 1) / 5) + 1;
    //Fin Paginación
    
    //Averiguar cual es código libre más pequeño
    $contador = 0;
    do{
      $contador++;
      if ($contador < 10){//Esto vale sólo si hay menos de 100 productos
        $codigoLibre = "COD00".$contador;
      }else {
        $codigoLibre = "COD0".$contador;
      }
      $consulta = $conexion->query("SELECT * FROM productos WHERE codigo='".$codigoLibre."'");
    }while($resultado = $consulta->fetchObject());

?>
<section class="container">
  <article>
    <h3 class="center-align">Ejercicio 3</h3>
    <p> Modifica la tienda virtual realizada anteriormente de tal forma que 
        todos los datos de los artículos se guarden en una base de datos.</p>
  </article>
</section>
<div class ="divider"></div>
<section class='container'>
  <article>
    <h4 class="blue-text center-align"><strong>GESTION DE PRODUCTOS</strong></h4>
    <table class="highlight centered">
      <tr class = "blue white-text">
          <th></th>
          <th class ="center-align">CODIGO</th>
          <th class ="center-align">NOMBRE</th>
          <th class ="center-align">DESCRIPCION</th>
          <th class ="center-align">PRECIO</th>
          <th class ="center-align">IMAGEN</th>
        <?php
            if ($_POST['enviar']!= "MODIFICACION"){
              
        ?>
          <th class="center-align">ALTA</th></tr>
      <tr>
        <form id="alta" action ="#" method ="post">
            <td></td>
            <td><input  class = "center-align" type ="text" name ="codigo" value ="<?=$codigoLibre?>" readonly></td>
            <td><input type ="text" name ="nombre" required></td>
            <td><input type ="text" name ="descripcion" required></td>
            <td><input type ="number" name ="precio" required></td>
            <td><input type ="file" name ="imagen" required></td>
            <td><input class = 'btn green center-align' type = 'submit' name='enviar' value='ALTA'></td> 
        </form>
      
      <?php 
          } else {
              $codigo = $_POST['codigo'];
              $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo='$codigo'");
              $registro = $consulta->fetchObject();
              
              $imagen = $registro->imagen;
              $codigo = $registro->codigo;
              $nombre =  $registro->nombre;
              $descripcion =  $registro->descripcion;
              $precio =  $registro->precio;
      ?>
      <th class ="center-align">MODIFICAR</th><th></th></tr>
      <tr>
        <form id="mod" action ="#" method ="post">
            <td class="center-align"></td>           
            <td class="center-align"><input type ="text" name ="codigo" value="<?=$codigo?>"></td>
            <td class="center-align"><input type ="text" name ="nombre" value="<?=$nombre?>"></td>
            <td class="center-align"><input type ="text" name ="descripcion" value="<?=$descripcion?>"></td>
            <td class="center-align"><input type ="number"  name ="precio" value="<?=$precio?>"></td>
            <td class="center-align"><input type ="file" name ="imagen" value="<?=$imagen?>"></td>
            <td class="center-align"><input class = 'btn yellow' type = 'submit' name='enviar' value='MODIFICAR'></td>
        </form>
      <?php
          }
      ?>
      <td></td> 
    </tr>
    <tr class = "blue white-text">
        <th class ="center-align">IMAGEN</th>
        <th class ="center-align">CODIGO</th>
        <th class ="center-align">NOMBRE</th>
        <th class ="center-align">DESCRIPCION</th>
        <th class ="center-align">PRECIO</th>
        <th class ="center-align">MODIFICACIÓN</th>
        <th class ="center-align">BAJA</th>
    </tr>
    <!--Imprimo el clientes-->
    <?php
      $consulta =  $conexion->query("SELECT * FROM productos ORDER BY codigo LIMIT ".(($pagina - 1) * 5).", 5");
      while ($registro = $consulta->fetchObject()){ 
    ?>
    <tr class="center-align">
        <td class="center-align"><img width= "50px" src='images/<?=$registro->imagen?>'</td>
        <td class="center-align"><?=$registro->codigo?></td>
        <td class="center-align"><?=$registro->nombre?></td>
        <td class="center-align"><?=$registro->descripcion?></td>
        <td class="center-align"><?=$registro->precio?>€</td>
        <form name=modificar action ="#" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align"><input type="submit" class="btn yellow" name ="enviar" value="MODIFICACION"></td>
        </form>
        <form name=borrado action ="pagina.php?ejercicio=ej3_baja" method ="post">
          <input type="hidden" name="codigo" value=<?=$registro->codigo?>>
          <td class="center-align"><input type="submit" class="btn red" name ="enviar" value="BAJA"></td>
        </form>
    </tr>    
    <?php
      }
    ?>
  </table>
</article>
<article>
  <ul class="pagination center-align">
    
<!--Paginación
    //Chevron primera página -->
    <li class="blue lighten-5"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina=1"><i class="material-icons">skip_previous</i></a></li>
    <?php
      //Chevron izquierdo
      echo '<li class="blue lighten-5 ';
      if($pagina == 1){ 
        echo 'disabled"><a>';
      } else {  
        echo '"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina='.($pagina-1).'">';
      }
      echo '<i class="material-icons">chevron_left</i></a></li> ';

      //Paginado por números  
      if ($numPaginas <= 3){//Si hay menos de tres páginas 
        $paginaPrimera = 1;
        $paginaUltima = $numPaginas;
      }
      else { //Si hay más de tres páginas de productos
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
      }
      for ($i = $paginaPrimera; $i <= $paginaUltima ; $i++){
        echo '<li class="waves-effect';
        if ($pagina == $i){
          echo 'active blue';
        } 
        echo '"><a href=pagina.php?ejercicio=ej3_administrar_productos&pagina='.$i.'>'.$i.'</a></li>';  
      }//fin for

      //Chevron derecho
      echo '<li class="blue lighten-5';
      if($pagina == $numPaginas){ 
        echo ' disabled"><a>';
      } else {
        echo '"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina='.($pagina+1).'">';
      }
      echo '<i class="material-icons">chevron_right</i></a></li> ';
  ?>
      <!--Chevron primera página-->
      <li class="blue lighten-5"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina=<?=($numPaginas)?>"><i class="material-icons">skip_next</i></a></li>
      <!--Fin Paginación-->
    </ul>
  </article>
</section>
<section class="section center-align">
    <a  class = "white-text blue btn" href="pagina.php?ejercicio=ej3_index">Volver</a>
</section>
<?php 
} catch (PDOException $e) { 
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>"; 
          die ("Error: " . $e->getMessage()); 
}
?> 