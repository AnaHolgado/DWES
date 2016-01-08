<?php

  class Animal {
    
    //Constructor y destructor
    public function __construct($sexo,$anno,$nombre) {
      $this->sexo = $sexo;
      $this->anno = $anno;
      $this->nombre = $nombre;
      self::$numAnimales++;
    }
    
    function __destruct() {
       echo "Oohhh!! Soy " . $this->nombre . " y me estoy muriendo....<br>";
    }

    // atributos de clase
    private static $numAnimales = 0;
   
    // métodos de clase
    public static function getnumAnimales() {
      return self::$numAnimales;
    }
    
    static function setNumAnimales($numAnimales) {
      self::$numAnimales = $numAnimales;
    }
    
    // atributos de instancia
    private $sexo;
    private $anno;
    private $nombre;

    // metodos de instancia
    function setSexo($sexo) {
      $this->sexo = $sexo;
    }

    function setAnno($anno) {
      $this->anno = $anno;
    }   
    
    function setNombre($nombre) {
      $this->nombre = $nombre;
    } 
    
    function getSexo() {
      return $this->sexo;
    }

    function getAnno() {
      return $this->anno;
    }
    
    function getNombre() {
      return $this->nombre;
    }

    function comer(){
      echo "Uff!! Cuanta hambre!!<br>";
    }
    
    function mirar(){
      echo "A ver que hay por aquí...<br>";
    }
    
    function tomarSol(){
      echo "Que bien me sienta tomar el sol!!!<br>";
    }
   
    function __toString() {
      return "Nombre: ".$this->nombre."<br>Edad: ".$this->anno."<br>Sexo: ".$this->sexo."<br>";
    }
  }
