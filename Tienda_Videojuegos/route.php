<?php
require_once "controller/ListController.php";
require_once "controller/LoginController.php";
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
        $listController->home(); 
        break;
    case 'inicio': 
        $listController->home(); 
        break;
    case 'registro':
        $loginController->signUpForm();
        break;
    case 'register':
        $loginController->newUser();
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
    case 'create': 
        $listController->createProduct(); 
        break;
    case 'delete': 
        $listController->deleteProduct($params[1]); 
        break;
    case 'update': 
        $listController->updateProduct(); 
        break;
    case 'verify':
        $loginController->verifyLogin();
        break;
    case 'mostrareditar': 
        $listController->showEditProduct($params[1]); 
        break;
    case 'detail': 
        $listController->details($params[1]); 
        break;
    case 'listCategory':
        $listController->showGenres();
        break;
    case 'listaPorGenero':
        $listController->getProductsByGenre($params[1]);
        break;
    case 'createGenre':
        $listController->createGenre();
        break;
    case 'deleteGenre': 
        $listController->deleteGenre($params[1]); 
        break;
    case 'updateGenre': 
        $listController->updateGenre(); 
        break;
    case 'mostrarEditarGenre': 
        $listController->showEditGenre($params[1]); 
        break;
    case 'toggleAdmin':
        $loginController->toggleAdmin($params[1]); 
        break;
    // case 'giveAdmin':
    //     $loginController->giveAdmin($params[1]); 
    //     break;
    // case 'removeAdmin':
    //     $loginController->removeAdmin($params[1]); 
    //     break;
    case 'showUserList':
        $loginController->showListAdmin();
        break;    
    case 'deleteUser':
        $loginController->deleteUser($params[1]);
        break;
    default: 
        echo('404 Page not found'); 
    break;
}

?>