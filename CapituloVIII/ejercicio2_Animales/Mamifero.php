<?php

  class Mamifero extends Animal {
    
    //Constructor y destructor
    public function __construct($sexo,$anno,$nombre,$tetillas,$alimentacion) {
      parent::__construct($sexo, $anno, $nombre);
      $this->tetillas = $tetillas;
      $this->alimentacion = $alimentacion;
      self::$numMamiferos++;
    }

    // atributos de clase
    private static $numMamiferos = 0;
   
    // métodos de clase
    public static function getnumMamiferos() {
      return self::$numMamiferos;
    }
    
    static function setNumMamiferos($numMamiferos) {
      self::$numMamiferos = $numMamiferos;
    }
    
    // atributos de instancia
    private $tetillas;
    private $alimentacion;

    // metodos de instancia
    function setTetilas($tetillas) {
      $this->tetillas = $tetillas;
    }

    function setAlimentacion($alimentacion) {
      $this->alimentacion = $alimentacion;
    }   
    
    function getTetillas() {
      return $this->tetillas;
    }

    function getAlimentacion() {
      return $this->alimentacion;
    }

    function marcar(){
      echo "Este es mi territorio!<br>";
    }
    
    function correr(){
      echo "Mira que rápido corro!!!<br>";
    }
    
    function dormir(){
      echo "Voy a descansar un poco. zzzzZZZZZ zzzzZZZZZ<br>";
    }
   
    function __toString() {
      return parent::__toString()."Tipo: Mamifero<br>".
          "Numero Tetillas: ". $this->tetillas.
          "<br>Alimentación: ".$this->alimentacion.
          "<br>";
    }
  }
