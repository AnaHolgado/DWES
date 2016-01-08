<?php 
$codigo = $_POST['codigo'];
$consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo='$codigo'");
//ALTA
    if($_POST['enviar'] == "ALTA"){
      
      $stock = $_POST['stock'];
      $precioCompra = $_POST['precioCompra'];
      $descripcion = $_POST['descripcion'];
      $precioVenta = $_POST['precioVenta'];
      //No necesito controlar si se repite el codigo porque lo genero automáticamente.
      $conexion->query("INSERT INTO ".$tabla." VALUES ('$codigo','$descripcion','$precioCompra','$precioVenta','$stock')");
    } 
//FIN ALTA
//BAJA
    if($_POST['enviar'] == "BAJA"){
      $consulta = "DELETE FROM ".$tabla." WHERE codigo = '$codigo'";
      $conexion->query($consulta); 
    } 
//FIN BAJA
//MODIFICAR
    if($_POST['enviar'] == "MODIFICAR"){
      $stock = $_POST['stock'];
      $precioCompra = $_POST['precioCompra'];
      $descripcion = $_POST['descripcion'];
      $precioVenta = $_POST['precioVenta'];
      $consulta = "UPDATE ".$tabla." SET stock ='$stock' , precioCompra ='$precioCompra', descripcion='$descripcion', precioVenta='$precioVenta'"
          . " WHERE codigo = '$codigo'";
      $conexion->query($consulta);
    } 
//FIN MODIFICAR
//ENTRADA MERCANCIAS
    if($_POST['enviar'] == "+"){
      $entrada = $_POST['entrada'];
      
      $registro = $consulta->fetchObject();
      $stock = $registro -> stock;
      $stock += $entrada;
      $consulta = "UPDATE ".$tabla." SET stock ='$stock' WHERE codigo = '$codigo'";
      $conexion->query($consulta);
    } 
//FIN ENTRADA MECANCIAS
//SALIDA MERCANCIAS --> Mantengo este apartado por si sale mercancia que no sea por venta.
    if($_POST['enviar'] == "-"){
      $codigo = $_POST['codigo'];
      $salida = $_POST['salida'];
      $consulta =  $conexion->query("SELECT * FROM ".$tabla." WHERE codigo='$codigo'");
      $registro = $consulta->fetchObject();
      $stock = $registro -> stock;
      if ($salida <= $stock){
        if ($salida == $stock){
          echo '<script type="text/javascript">alert("Se ha quedado sin existencias, debe reponer el producto.");</script>';
        }
        $stock -= $salida;
        $consulta = "UPDATE ".$tabla." SET stock ='$stock' WHERE codigo = '$codigo'";
        $conexion->query($consulta);
      }else {
        echo '<script type="text/javascript">alert("Lo siento, desea sacar mas productos de los que hay.");</script>';
      }
    }
//FIN SALIDA MECANCIAS
//PAGINACIÓN
    $productosPorPaginas = 5;
    if (!isset($_GET['pagina'])){
      $pagina= 1;
    } else{
      $pagina = $_GET['pagina'];
    }
    $consulta =  $conexion->query("SELECT * FROM ".$tabla."");
    $numProductos = $consulta->rowCount();
    $numPaginas = floor(abs($numProductos - 1) / $productosPorPaginas) + 1;

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
//FIN PAGINACÍON

//NUEVO CODIGO
    //Averiguar cual es código libre más pequeño
    $contador = 0;
    do{
      $contador++;
      if ($contador < 10){//Esto vale sólo si hay menos de 100 productos
        $codigoLibre = "COD0000".$contador;
      }else if($contador <100){
        $codigoLibre = "COD000".$contador;
      }else if($contador <1000){
        $codigoLibre = "COD00".$contador;
      }else if($contador <10000){
        $codigoLibre = "COD0".$contador;
      }else if($contador <100000){
        $codigoLibre = "COD".$contador;
      }else {
        echo '<script type="text/javascript">alert("Se ha quedado sin espacio en la base de datos, elimine algún producto") </script>';
      }
      $consulta = $conexion->query("SELECT * FROM ".$tabla." WHERE codigo='".$codigoLibre."'");
    }while($resultado = $consulta->fetchObject());
//FIN CODIGO
?>
