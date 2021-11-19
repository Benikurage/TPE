<?php

require_once 'libs/Router.php';
require_once 'controller/ApiComentController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comment', 'GET', 'ApiComentController', 'getComments');
$router->addRoute('comment/:ID', 'GET', 'ApiComentController', 'getComments');
$router->addRoute('comment/:ID', 'DELETE', 'ApiComentController', 'deleteComments');
$router->addRoute('comment', 'POST', 'ApiComentController', 'addComment');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);