<?php
//Se carga la Clase Usuario

require_once 'Twig/lib/Twig/Autoloader.php';
      
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);
echo $twig->render('index.html.twig');

/*
//Se carga la Clase Usuario
require_once '../Model/Usuario.php';

//Se busca en la base de datos los datos de todos los usuarios
$data['usuarios'] = Usuario::getUsuarios();

// Carga la vista de listado
include '../View/listadoUsuarios.php';

*/