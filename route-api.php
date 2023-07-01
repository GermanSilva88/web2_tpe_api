<?php
require_once 'libs/Router.php';
// crea el router
$router = new Router();
// define la tabla de ruteo
$router->addRoute('games', 'GET', 'ApiTaskController', 'obtenerTareas');
$router->addRoute('games', 'POST', 'ApiTaskController', 'crearTarea');
$router->addRoute('games/:ID', 'GET', 'ApiTaskController', 'obtenerTarea');
$router->addRoute('games/:ID', 'DELETE', 'ApiTaskController', 'borrarTarea');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);