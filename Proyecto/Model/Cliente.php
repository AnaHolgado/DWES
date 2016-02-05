<?php

require_once 'ProyectoDB.php';

class Cliente {
  
  //Atributos de clase
  /*private static $numCliTotales = 0;*/
  
  //Métodos de clase
  /*
  static function getNumCliTotales() {
    return self::$numCliTotales;
  }

  static function setNumCliTotales($numCliTotales) {
    self::$numCliTotales = $numCliTotales;
  }*/
  //Constructor  
  function __construct($codCli, $nomempCli, $tlfCli, $emailCli, $nomconCli) {
    $this->codCli = $codCli;
    $this->nomempCli = $nomempCli;
    $this->emailCli = $emailCli;
    $this->tlfCli = $tlfCli;
    $this->nomconCli = $nomconCli;
  }
  
  //Atributos de instancia
  private $codCli;
  private $nomempCli;
  private $emailCli;
  private $tlfCli;
  private $nomconCli;
  
  //Métodos de instancia
  public function insert() {
    $conexion = ProyectoDB::connectDB();
    $insercion = "INSERT INTO cliente VALUES (\"\",\"".$this->nomempCli."\",\"".$this->emailCli."\", \"".$this->tlfCli."\",\"".$this->nomconCli."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = ProyectoDB::connectDB();
    $borrado = "DELETE FROM cliente WHERE codCli=\"".$this->codCli."\"";
    $conexion->exec($borrado);
  }
  
  public function update() {
    $conexion = ProyectoDB::connectDB();
    $update = "UPDATE cliente SET nomempCli ='$this->nomempCli'"
        . ", emailCli ='$this->emailCli', tlfCli ='$this->tlfCli'"
        . ", nomconCli ='$this->nomconCli'"
        . " WHERE codCli=\"".$this->codCli."\"";
    print_r($update);
    $conexion->exec($update);
  }
  
  public static function getClientes() {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT codCli, nomempCli, emailCli, tlfCli, nomconCli FROM cliente";
    $consulta = $conexion->query($seleccion);
    $usuarios = [];
    while ($registro = $consulta->fetchObject()) {
      $usuarios[] = new Cliente($registro->codCli, $registro->nomempCli,  
          $registro->tlfCli, $registro->emailCli, $registro->nomconCli);
    }
    return $usuarios;   
  }
 
  public static function getClienteById($id) {
    $conexion = ProyectoDB::connectDB();
    $seleccion = "SELECT codCli,nomempCli,tlfCli,nomconCli FROM cliente WHERE codCli=\"".$id."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $cliente = new Cliente($registro->codCli, $registro->nomempCli, $registro->emailCli, $registro->tlfCli, $registro->nomconCli);
    return $cliente;    
  }
 
  //Getter y setter de instancia
  function getCodCli() {
    return $this->codCli;
  }

  function getNomempCli() {
    return $this->nomempCli;
  }

  function getEmailCli() {
    return $this->emailCli;
  }

  function getTlfCli() {
    return $this->tlfCli;
  }

  function getNomconCli() {
    return $this->nomconCli;
  }

  function setCodCli($codCli) {
    $this->codCli = $codCli;
  }

  function setNomempCli($nomempCli) {
    $this->nomempCli = $nomempCli;
  }

  function setEmailCli($emailCli) {
    $this->emailCli = $emailCli;
  }

  function setTlfCli($tlfCli) {
    $this->tlfCli = $tlfCli;
  }

  function setNomconCli($nomconCli) {
    $this->nomconCli = $nomconCli;
  }


}
