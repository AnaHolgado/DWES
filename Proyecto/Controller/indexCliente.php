<?php
//Se carga la Clase Usuario
require_once '../Model/Cliente.php';

require_once 'Twig/lib/Twig/Autoloader.php';

//Se busca en la base de datos los datos de todos los usuarios
$clientes = Cliente::getClientes();
      
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);
echo $twig->render('listadoClientes.html.twig', ['clientes' => $clientes]);
