


<?php 
if (isset($_POST["enviar"])){//Cuando se compra o elimina se ejecuta este código
        //Si se compra un producto
        if ($_POST['enviar'] == "COMPRAR"){
            $codigoCompra = $_POST['comprita'];//Recojo el código del producto comprado
            /*Si no hay ningún producto introduce el codigo y la unidad se pone 
             * a uno, si ya existe el producto sólo incrementa las unidades.*/
            $_SESSION['carrito'][$codigoCompra]++; 
        }
            
        //Si se elimina se elimina un producto
        if ($_POST['enviar'] == "ELIMINAR"){
            $eliminado = $_POST['eliminado'];
            unset($_SESSION['carrito'][$eliminado]);
        }
    }     
?>
  <article id = "carrito" class = "col s4">
    <h3 class="center-align blue white-text">CARRITO</h3>
    <section class="center-align row">
      <?php
      //Imprimir el carrito
        $total = 0;
        $totalUnidades = 0;
        if (isset($_SESSION['carrito'])){
          foreach ($_SESSION['carrito'] as $compra => $unidades) {
             $consulta =  $conexion->query("SELECT * FROM productos WHERE codigo = '$compra'");
             $registro = $consulta->fetchObject();
      ?>
      <article class = 'center-align white col s6'>
        <br><img width='50px' height='50px' src='images/<?=$registro ->imagen?>'>
        <br>Nombre : <?=$registro ->nombre?>
        <br>Precio : <?=$registro ->precio. "€"?>
        <br>Unidades: <?=$unidades?>
        <!--Si se elimina el producto se envía el código a arriba y se elimina del carrito-->
        <form action='#' method='POST'>
          <input type='hidden' name='eliminado' value='<?=$compra?>'/>
          <input class = 'red white-text chip btn'  type = 'submit' name='enviar' value='ELIMINAR'>
        </form>
      </article>
      <?php
            $total += ($registro ->precio)*$unidades;
            $totalUnidades+= $unidades; 
          }
          
        }
      ?>
      
    </section>
    <section>
        <article id ='total' class='center-align blue white-text'>Productos: <?= $totalUnidades?> Total: <?=$total?> €</article>
    </section>
  </article>
