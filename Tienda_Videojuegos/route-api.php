<?php

require_once './libs/Router.php';
require_once './controller/ApiCommentController.php';

$router = new Router();

$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'createComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'deleteComment');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getComments');
$router->addRoute('comentarios/:ID/:SCORE', 'GET', 'ApiCommentController', 'getComments');
// $router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'getComment');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);