<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
      include_once 'Vehiculo.php';
      include_once 'Coche.php';
      include_once 'Bicicleta.php';

      $cocheDeLuis = new Coche("Saab", "93","rojo");
      $cocheDeJuanK = new Coche("Toyota", "Avensis","verde");
      $bicicletaJulieta = new Bicicleta("BTWIN", "RockRider 300","2013");

      $cocheDeJuanK->getMarca();
      $cocheDeJuanK->getColor();
      $bicicletaJulieta->getAnno();
      $cocheDeLuis->anda(30);
      $cocheDeLuis->getKmRecorridos();
      $cocheDeJuanK->quemaRueda();
      $cocheDeLuis->anda(40);
      $cocheDeLuis->anda(220);
      $bicicletaJulieta->anda(10);
      $cocheDeLuis->quemaRueda();
      $bicicletaJulieta->hacerCaballito();
      $cocheDeJuanK->anda(60);
      $cocheDeJuanK->anda(150);
      $cocheDeJuanK->anda(90);
      $bicicletaJulieta->anda(6);
      echo "El coche de Luis ha recorrido " . $cocheDeLuis->getKmRecorridos() . "Km.<br>";
      echo "El coche de Juan Carlos ha recorrido " . $cocheDeJuanK->getKmRecorridos() . "Km.<br>";
      echo "La bicicleta de Julieta ha recorrido " . $bicicletaJulieta->getKmRecorridos() . "Km.<br>";
      echo "El kilometraje total ha sido de " . Vehiculo::getKmTotales() . "Km<br>";  
      echo "Se han creado " . Vehiculo::getVehiculosCreados() ." vehiculos.";
    ?>
  </body>
</html>
