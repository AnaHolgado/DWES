<?php

  class Ave extends Animal {
    
    //Constructor y destructor
    public function __construct($sexo,$anno,$nombre,$ecosistema) {
      parent::__construct($sexo, $anno, $nombre);
      $this->ecosistema = $ecosistema;
      self::$numAve++;
    }

    // atributos de clase
    private static $numAve = 0;
   
    // métodos de clase
    public static function getnumAve() {
      return self::$numAve;
    }
    
    static function setNumAve($numAve) {
      self::$numAves = $numAve;
    }
    
    // atributos de instancia
    private $huevos = 0;

    // metodos de instancia
    function setEcosistema($ecosistema) {
      $this->ecosistema = $ecosistema;
    }

    function getEcosistema() {
      return $this->ecosistema;
    }
    
    function setHuevos($huevos) {
      $this->huevos = $huevos;
    }

    function getHuevos() {
      return $this->huevos;
    }

    function ponerHuevos($huevos){
      self::setHuevos(self::getHuevos()+$huevos);
      echo "He puesto ".$huevos." huevos.<br>";
    }
    
    function volar(){
      echo "Mira como vuelo!!<br>";
    }
    
    function cantar(){
      echo "Pipipippí pipipi pipipipipí...";
    }
   
    function __toString() {
      return parent::__toString()."Tipo: Ave".
          "<br>Numero Huevos: ". $this->huevos.
          "<br>Ecosistema: ".$this->ecosistema.
          "<br>";
    }
  }
