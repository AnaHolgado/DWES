<section>
  <article>
<!--Paginación-->
  <ul class="pagination center-align">
    <!--Chevron primera página -->
    <li class="blue lighten-5"><a href="<?=$url?>&pagina=1"><i class="material-icons">skip_previous</i></a></li>
    <?php
      //Chevron izquierdo
      echo '<li class="blue lighten-5 ';
      if($pagina == 1){ 
        echo 'disabled"><a>';
      } else {  
        echo '"><a href="'.$url.'&pagina='.($pagina-1).'">';
      }
      echo '<i class="material-icons">chevron_left</i></a></li> ';

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
        echo ' disabled"><a>';
      } else {
        echo '"><a href="'.$url.'&pagina='.($pagina+1).'">';
      }
      echo '<i class="material-icons">chevron_right</i></a></li> ';
  ?>
      <!--Chevron primera página-->
      <li class="blue lighten-5"><a href="<?=$url?>&pagina=<?=($numPaginas)?>"><i class="material-icons">skip_next</i></a></li>
      <!--Fin Paginación-->
    </ul>
  </article>
</section>