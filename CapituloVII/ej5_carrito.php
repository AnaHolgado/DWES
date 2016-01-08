<?php 
if (isset($_POST["venta"])){//Si se compra un producto
  $codigo = $_POST['codigo'];//Recojo el código del producto comprado
  $consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo='$codigo'");//Saco sus datos de la base de datos
  $registro = $consulta->fetchObject();//Lo paso a objeto
  $stock = $registro -> stock;//Necesito saber el stock del producto para saber cuantos productos se pueden comprar como máximo.
  if ($_POST['venta'] == "-"){//Cuando en la tienda se pulsa el botón de venta se ejecuta este if
    $salida = $_POST['salida'];
    if($salida == 0){
      echo '<script type="text/javascript">alert("Indique cuantas unidades que desea comprar, gracias.");</script>'; 
    }else if (($_SESSION['carrito'][$codigo]+$salida) <= $stock){//Si lo que se compra es menor que el stock
        $_SESSION['carrito'][$codigo] += $salida; 
    } else{
      echo '<script type="text/javascript">alert("Lo siento, desea sacar mas productos de los que hay.");</script>'; 
    }
  }
            
  //Se elimina todo el producto del carrito
  if ($_POST['venta'] == "ELIMINAR"){
      $codigo = $_POST['codigo'];
      unset($_SESSION['carrito'][$codigo]);
  }
  //Se elimina una unidad del producto del carrito
  if ($_POST['venta'] == "MENOS"){
      $codigo = $_POST['codigo'];
      if($_SESSION['carrito'][$codigo]>0){
        $_SESSION['carrito'][$codigo]--;
      }
  }
  //Se aumenta una unidad del producto del carrito
  if ($_POST['venta'] == "MAS"){
      $codigo = $_POST['codigo'];
      if ($stock >= $_SESSION['carrito'][$codigo]+1){
        $_SESSION['carrito'][$codigo]++;
      }else {
        echo '<script type="text/javascript">alert("Lo siento, desea sacar mas productos de los que hay.");</script>';
      }
  }
}     
?>
  <article id = "carrito">
    <h3 class="center-align blue white-text">CARRITO</h3>
    <section class="center-align row">
      <?php
      //Imprimir el carrito
        $total = 0;
        $totalUnidades = 0;
        if (isset($_SESSION['carrito'])){
          foreach ($_SESSION['carrito'] as $compra => $unidades) {
             $consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo = '$compra'");
             $registro = $consulta->fetchObject();
      ?>
      <article class = 'center-align yellow lighten-5 col s6 card'>
        <br>Codigo : <?=$registro ->codigo?>
        <br>Precio : <?=number_format($registro ->precioVenta,2). "€"?>
        <br>Unidades: <?=$unidades?> uds.
        <!--Si se elimina el producto se envía el código a arriba y se elimina del carrito-->
        <form action='#' method='POST'>
          <input type='hidden' name='codigo' value='<?=$compra?>'/>
          <button class = 'orange lighten-2 white-text btn-floating'  type = 'submit' name='venta' value='MENOS'>-</button>
          <button class = 'red white-text btn-floating'  type = 'submit' name='venta' value='ELIMINAR'><i class="material-icons">delete</i></button>
          <button class = 'orange  lighten-2 white-text btn-floating'  type = 'submit' name='venta' value='MAS'>+</button>
        </form>
      </article>
<?php
      $total += ($registro ->precioVenta)*$unidades;
      $totalUnidades+= $unidades; 
    }
  }
?>
    </section>
    <section><!--Introducir Código de descuento-->
        <article class ="center-align">
            <?php
              $_SESSION['codigos']=["DES001"=>0.1,"DES002"=>0.2,"DES003"=>0.3];
              $codigoDescuento = $_POST['codigoDescuento'];
              if(!isset($_POST['validar']) && !isset($_POST['venta'])){
                $_SESSION['descuento']=1;
              } 
              if(array_key_exists($codigoDescuento, $_SESSION['codigos'])){
                $_SESSION['descuento'] = $_SESSION['codigos'][$codigoDescuento];
              } 
              if(!array_key_exists($codigoDescuento, $_SESSION['codigos']) && $_POST['codigoDescuento']){
                echo "<p class=' red-text'>CODIGO ERRONEO</p>";
              }
            ?>
            <?php
          if($_SESSION['descuento']!= 1){
        ?>
        <p class='center-align chip green white-text'>DESCUENTO: <?=$_SESSION['descuento']*100?>%</p>
        <?php
          }
        ?>
            <form class ="row" action="#" method="POST">
                <span class="col s6"><input placeholder="CODIGO DESCUENTO" class="center-align" type="text" name="codigoDescuento"></span>
              <span class="col s1">&nbsp;</span>
              <input type="submit" class="btn  col s5" name ="validar" value="VALIDAR">
            </form>
        </article>
    </section>
    <section class = "section center-align">
        <article><a class="btn blue" href="pagina.php?ejercicio=ej5_facturacion">COMPRAR</a></article><!--Lleva a la emmision de facturas -->
    </section>
    <section>
        
        <article id ='total' class='center-align blue white-text'>
            <p>Productos: <?= $totalUnidades?> uds. Total: <?=number_format((1-$_SESSION['descuento'])*$total,2)?> €</p>
        </article>
    </section>
  </article>
