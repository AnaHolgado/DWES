<?php 
session_start(); // Inicio de sesión
$conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
//Paginación
$elementosPagina = 9;
$url = "pagina.php?ejercicio=ej3_index";
include 'ej3_paginacion.php';
//Fin Paginación
    
?>
<section>
  <article class="center-align">
      <h3>EJERCICIO 3</h3>
      <p>Modifica la tienda virtual realizada anteriormente de tal forma que todos los datos de los artículos se guarden en una base de datos.</p>  
  </article>
</section>
<div class ="divider"></div>
<section class ="section">
    <article class="center-align">
      <strong><a class="blue btn" href="pagina.php?ejercicio=ej3_administrar_productos">GESTIÓN DE PRODUCTOS</a></strong>
    </article>
</section>
  <div class ="divider"></div>
<section class="section container row">
  <article id = "catalogo" class = "col s8">
    <h3  class="center-align blue white-text">CATÁLOGO</h3>
    <section class="row">
    <?php
        //Imprimo el catálogo
      $consulta =  $conexion->query("SELECT * FROM productos ORDER BY codigo LIMIT ".(($pagina - 1) * 5).", $elementosPagina");
      while ($registro = $consulta->fetchObject()){ 
    ?>
      <article class = 'col s4 row center-align'>
        <br><img width= '100px'height='100px' src='images/<?=$registro -> imagen?>'>
        <br><p>Codigo: <?=$registro -> codigo?>
        <br>Nombre: <?=$registro -> nombre?>
        <br>Precio: <?=$registro -> precio?>€</p>
        <!--Si se compra el producto se envía el código para meterlo en el carrito -->
        <form class = 'col s6' action='#' method='POST'>
          <input type='hidden' name='comprita' value='<?=$registro -> codigo?>'/>
          <button class = 'green white-text chip btn' type = 'submit' name='enviar' value='COMPRAR'>COMPRAR</button>
        </form>
        <form class = 'col s6' action='pagina.php?ejercicio=ej3_detalle' method='POST'>
          <input type='hidden' name='producto' value='<?=$registro -> codigo?>'/>
          <button class = 'blue white-text chip btn' type = 'submit' name='enviar' value='DETALLE'>DETALLE </button>
        </form>
      </article>

        <?php            
      }

    ?>
    </section>
    <section>
    <!--Paginación-->
     <ul class="pagination center-align">
    <!--Chevron primera página -->
    <li class="blue lighten-5"><a href="<?=$url?>&pagina=1"><i class="material-icons">skip_previous</i></a></li>
    <?php
        //Chevron izquierdo
      echo '<li class="blue lighten-5 ';
      if($pagina == 1){ 
        echo 'disabled"><a href="#">';
      } else {  
        echo '"><a href="'.$url.'&pagina='.($pagina-1).'">';
      }
      echo '<i class="material-icons">chevron_left</i></a></li> ';
  //Números intermedios
  for ($i = $paginaPrimera; $i <= $paginaUltima ; $i++){
        echo '<li class="waves-effect';
        if ($pagina == $i){
          echo 'active blue';
        } 
        echo '"><a href='.$url.'&pagina='.$i.'>'.$i.'</a></li>';  
      }//fin for

      //Chevron derecho
      echo '<li class="blue lighten-5';
      if($pagina == $numPaginas){ 
        echo ' disabled"><a href="#">';
      } else {
        echo '"><a href="'.$url.'&pagina='.($pagina+1).'">';
      }
      echo '<i class="material-icons">chevron_right</i></a></li> '; 
    ?>
    <!--Chevron primera página-->
    <li class="blue lighten-5"><a href="'.$url.'&pagina=<?=($numPaginas)?>"><i class="material-icons">skip_next</i></a></li>
     </ul>
    </section>
    </article>
  <?php include 'ej3_carrito.php'; ?>
</section>
