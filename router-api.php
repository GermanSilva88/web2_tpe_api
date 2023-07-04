<?php

require_once 'libs/Router.php';
require_once 'api_comment_controller/api_comment_controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comment', 'GET', 'api_comment_controller', 'get_coms'); //lista todos los comentarios, ordenados, filtrados, paginados o de manera normal
$router->addRoute('comment', 'POST', 'api_comment_controller', 'add_com'); //agrega un comentario nuevo
$router->addRoute('comment/:ID', 'GET', 'api_comment_controller', 'get_com'); //lista un comentario segun ID
$router->addRoute('comment/:ID', 'DELETE', 'api_comment_controller', 'delete_com'); //elimina un comentario segun ID
$router->addRoute('comment/:ID', 'PUT', 'api_comment_controller', 'update_com'); //modifica un comentario segun ID

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);