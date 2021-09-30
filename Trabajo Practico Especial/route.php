<?php
require_once "controller/controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$Controller = new Controller();


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $Controller->Home(); 
        break;
    case 'createTask': 
        $Controller->create(); 
        break;
    case 'deleteTask': 
        $Controller->delete($params[1]); 
        break;
    case 'updateTask': 
        $Controller->update($params[1]); 
        break;
    case 'viewTask': 
        $Controller->view($params[1]); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}


?>