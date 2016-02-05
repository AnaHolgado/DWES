<?php

$baseDatos = "proyecto";
$tabla = "usuario";
$conexion = new PDO("mysql:host=localhost;dbname=".$baseDatos.";charset=utf8", "root", "root");

$codUsu = $_POST['codUsu'];

require_once '../Model/Usuario.php';

//ALTA
    if($_POST['ACTION'] == "ALTA"){
      $nomUsu = $_POST['nomUsu'];
      $catUsu = $_POST['catUsu'];
      $emailUsu = $_POST['emailUsu'];
      $permisoUsu = $_POST['permisoUsu'];
      $loginUsu = $_POST['loginUsu'];
      $passUsu = $_POST['passUsu'];
      $usuario = new Usuario("",$nomUsu, $emailUsu, $catUsu, $loginUsu, $passUsu, $permisoUsu);
      $usuario->insert();
    } 
//FIN ALTA
 
//BAJA
    if($_POST['ACTION'] == "BORRAR"){
      $usuario = Usuario::getUsuarioById($codUsu);
      $usuario->delete();
    } 
//FIN BAJA

//MODIFICAR
    if($_POST['ACTION'] == "MODIFICAR"){

      $usuario = Usuario::getUsuarioById($codUsu);

      $nomUsu = $_POST['nomUsu'];
      $catUsu = $_POST['catUsu'];
      $emailUsu = $_POST['emailUsu'];
      $permisoUsu = $_POST['permisoUsu'];
      $loginUsu = $_POST['loginUsu'];
      $passUsu = $_POST['passUsu'];

      $usuario->setCodUsu($codUsu);
      $usuario->setNomUsu($nomUsu);
      $usuario->setEmailUsu($emailUsu);
      $usuario->setCatUsu($catUsu);
      $usuario->setLoginUsu($loginUsu);
      $usuario->setPassUsu($passUsu);
      $usuario->setPermisoUsu($permisoUsu);

      $usuario->update();
    } 
//FIN MODIFICAR

 header("Location: ../Controller/indexUsuario.php");


