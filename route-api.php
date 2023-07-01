<?php

require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comment', 'GET', 'api_comment_controller', 'get_comments');
$router->addRoute('comment', 'POST', 'api_comment_controller', 'add_comment');
$router->addRoute('comment/:ID', 'GET', 'api_comment_controller', 'get_comment');
$router->addRoute('comment/:ID', 'DELETE', 'api_comment_controller', 'delete_comment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);