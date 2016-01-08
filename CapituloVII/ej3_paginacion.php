<?php 
  //Paginación
  /*Incluir en la pagina a paginar cuantos productos se muestran por página en $elementosPagina*/
  /*Incluir la consulta antes de imprimir $consulta =  $conexion->query("SELECT * FROM productos ORDER BY codigo LIMIT ".(($pagina - 1) * 5).", $elementosPagina");*/
  if (!isset($_GET['pagina'])){
    $pagina= 1;
  } else{
    $pagina = $_GET['pagina'];
  }
  $consulta =  $conexion->query("SELECT * FROM productos");
  $numProductos = $consulta->rowCount();
  $numPaginas = floor(abs($numProductos - 1) / $elementosPagina) + 1;
  
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
  /* Incluir este código para visualizar la paginación
  <li class="blue lighten-5"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina=1"><i class="material-icons">skip_previous</i></a></li>
  //Chevron izquierdo
      echo '<li class="blue lighten-5 ';
      if($pagina == 1){ 
        echo 'disabled"><a href="#">';
      } else {  
        echo '"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina='.($pagina-1).'">';
      }
      echo '<i class="material-icons">chevron_left</i></a></li> ';
  //Números intermedios
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
        echo ' disabled"><a href="#">';
      } else {
        echo '"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina='.($pagina+1).'">';
      }
      echo '<i class="material-icons">chevron_right</i></a></li> ';
   * 
   *  <!--Chevron primera página-->
      <li class="blue lighten-5"><a href="pagina.php?ejercicio=ej3_administrar_productos&pagina=<?=($numPaginas)?>"><i class="material-icons">skip_next</i></a></li>
      
  */
?> 