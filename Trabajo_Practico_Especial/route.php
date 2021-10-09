<?php
require_once "controller/ListController.php";
require_once "controller/loginController.php";
require_once "Helpers/AuthHelper.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$listController = new ListController();
$loginController = new loginController();
$helper = new AuthHelper();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $listController->inicio(); 
        break;
    case 'inicio': 
        $listController->inicio(); 
        break;
    case 'registro':
        $loginController->registro();
        break;
    case 'login': 
        $loginController->login(); 
        break;
    case 'logout': 
        $loginController->logout(); 
        break;
    case 'lista':
        $listController->list();
        break;
    case 'register':
        $loginController->newUser();
        break;
    case 'create': 
        $listController->create(); 
        break;
    case 'delete': 
        $listController->delete($params[1]); 
        break;
    case 'update': 
        $listController->update(); 
        break;
    //case 'view': 
        //    $listController->view($params[1]); 
        //    break;
    case 'verify':
        $helper->checkLoggedIn();
        break;
    case 'mostrareditar': 
        $listController->mostrarEditar($params[1]); 
        break;
    case 'detail': 
        $listController->detalles($params[1]); 
        break;
    case 'genero': 
        $listController->genero(); 
        break;
    
    default: 
        echo('404 Page not found'); 
    break;
}


?>