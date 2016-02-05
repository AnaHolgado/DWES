<?php

$baseDatos = "proyecto";
$tabla = "cliente";
$conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");

$codCli = $_POST["codCli"];

require_once '../Model/Cliente.php';

//ALTA
    if($_POST['ACTION'] == "ALTA"){
      $nomempCli = $_POST['nomempCli'];
      $tlfCli = $_POST['tlfCli'];
      $emailCli =  $_POST['emailCli'];
      $nomconCli = $_POST['nomconCli'];
      $cliente = new Cliente("",$nomempCli, $emailCli, $tlfCli, $nomconCli);
      $cliente->insert();
    } 
//FIN ALTA
 
//BAJA
    if($_POST['ACTION'] == "BORRAR"){
      $cliente = Cliente::getClienteById($codCli);
      $cliente->delete();
    } 
//FIN BAJA

//MODIFICAR
    if($_POST['ACTION'] == "MODIFICAR"){
      $cliente = Cliente::getClienteById($codCli);
      $nomempCli = $_POST['nomempCli'];
      $tlfCli = $_POST['tlfCli'];
      $emailCli = $_POST['emailCli'];
      $nomconCli = $_POST['nomconCli'];
      $cliente->setCodCli($codCli);
      $cliente->setNomempCli($nomempCli);
      $cliente->setEmailCli($emailCli);
      $cliente->setTlfCli($tlfCli);
      $cliente->setNomconCli($nomconCli);

      $cliente->update();
    } 
//FIN MODIFICAR

 header("Location: ../Controller/indexCliente.php");


