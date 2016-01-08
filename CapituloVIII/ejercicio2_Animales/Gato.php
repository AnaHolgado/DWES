<?php

  class Gato extends Mamifero {
    
    //Constructor y destructor
    public function __construct($sexo,$anno,$nombre,$tetillas,$alimentacion,$raza, $manto) {
      parent::__construct($sexo, $anno, $nombre,$tetillas,$alimentacion);
      $this->raza = $raza;
      $this->manto = $manto;
      self::$numGatos++;
    }

    // atributos de clase
    private static $numGatos = 0;
   
    // métodos de clase
    public static function getnumGatos() {
      return self::$numGatos;
    }
    
    static function setNumGatos($numGatos) {
      self::$numGatos = $numGatos;
    }
    
    // atributos de instancia
    private $raza;
    private $manto;

    // metodos de instancia
    function setRaza($raza) {
      $this->raza = $raza;
    }

    function setManto($manto) {
      $this->manto = $manto;
    }

    function getRaza() {
      return $this->raza;
    }

    function getManto() {
      return $this->manto;
    }

    function marcar(){
      echo "Pipí va!!!!<br>";
    }
    
    function maullar(){
      echo "Mauu!!!Mau!!!<br>";
    }
    
    function rascarSofa(){
      echo "Ras Ras Ras...<br>";
    }
   
    function __toString() {
      return parent::__toString()."Especie: Gato<br>".
          "Raza: ". $this->raza.
          "<br>Manto: ".$this->manto.
          "<br>";
    }
  }
