<?php

  include_once 'Vehiculo.php';
  
  class Bicicleta extends Vehiculo {


    public function __construct($ma, $mo, $anno) {
      parent::__construct($ma, $mo);
      $this->anno = $anno;
    }

    public function getAnno() {
      return $this->anno;
    }
    
    public function anda($km){
      $this->setKmRecorridos($km);     
      parent::setKmTotales($km);
      echo "clin clin<br>";
    }
    
    public function hacerCaballito(){
      echo "Mira! Sin manos!<br>";
    }

  }
