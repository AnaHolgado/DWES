<?php
//Se carga la Clase Usuario
require_once '../Model/Usuario.php';

require_once 'Twig/lib/Twig/Autoloader.php';

//Se busca en la base de datos los datos de todos los usuarios
$usuarios = Usuario::getUsuarios();
      
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);
echo $twig->render('listadoUsuarios.html.twig', ['usuarios' => $usuarios]);

/*
//Se carga la Clase Usuario
require_once '../Model/Usuario.php';

//Se busca en la base de datos los datos de todos los usuarios
$data['usuarios'] = Usuario::getUsuarios();

// Carga la vista de listado
include '../View/listadoUsuarios.php';

*/