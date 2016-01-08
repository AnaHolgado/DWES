<?php

  class Vehiculo {

    // atributos de clase
    private static $kilometrajeTotal = 0;
    private static $vehiculosCreados = 0;

    // métodos de clase
    public static function setKmTotales($km) {
      Vehiculo::$kilometrajeTotal += $km;
    }
    
    public static function getKmTotales() {
      return Vehiculo::$kilometrajeTotal;
    }
    
    public static function getVehiculosCreados(){
      return Vehiculo::$vehiculosCreados;
    }
    
    
    //atricutos de instancia
    private $marca;
    private $modelo;
    private $kilometraje;
    
    //Constructor
    public function __construct($ma, $mo) {
      $this->marca = $ma;
      $this->modelo = $mo;
      $this->kilometraje = 0;
      Vehiculo::$vehiculosCreados++;
    }
    
    //metodos de instancia
    public function getKmRecorridos() {
      return $this->kilometraje;
    }
    
    public function setKmRecorridos($km) {
      return $this->kilometraje += $km;
    }
    
    public function getMarca(){
      return $this->marca;
    }
    
    public function getModelo(){
      return $this->modelo;
    }

    
    

  }
