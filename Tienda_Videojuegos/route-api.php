<?php

require_once 'libs/Router.php';
require_once 'controller/ApiCommentController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo

$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'getComments');
// $router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');
// $router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');
// $router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getComments');
// $router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'deleteComments');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);