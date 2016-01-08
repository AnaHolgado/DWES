<?php

  include_once 'Vehiculo.php';
  
  class Coche extends Vehiculo {

    public function __construct($ma, $mo, $color) {
      parent::__construct($ma, $mo);
      $this->color = $color;
    }

    public function getColor() {
      return $this->color;
    }
    
    public function anda($km){
      $this->setKmRecorridos($km);     
      parent::setKmTotales($km);
      echo "run run <br>";
    }
    
    public function quemaRueda(){
      echo "Uff!! Que humazo!!<br>";
    }

  }
