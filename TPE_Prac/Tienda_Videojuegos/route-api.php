<?php

require_once 'libs/Router.php';
require_once 'controller/ApiCommentController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiComentController', 'getComents');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController', 'getComents');
$router->addRoute('comentarios/:ID/COUNT', 'GET', 'ApiComentController', 'getComentsCount');
$router->addRoute('comentarios/:ID/:INIT', 'GET', 'ApiComentController', 'getLimitedComents');
$router->addRoute('comentarios/', 'POST', 'ApiComentController', 'addComent');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'deleteComents');
$router->addRoute('comentarios/:ID/:ESTRELLAS', 'GET', 'ApiComentController', 'flitrarPorEstrellas');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);