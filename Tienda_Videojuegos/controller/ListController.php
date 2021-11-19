<?php 

require_once "./model/GenreModel.php";
require_once "./model/ProductModel.php";
require_once "./view/ListView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./controller/LoginController.php";

class ListController{

    private $model;
    private $genreModel;
    private $view;
    private $helper;
    private $loginController;

    function __construct(){
        $this->genreModel = new GenreModel();
        $this->model = new ProductModel();
        $this->view = new ListView();
        $this->helper = new AuthHelper();
        $this->loginController = new LoginController();
    }

    function sessionCheck(){
        if(!isset($_SESSION['ID_USER'])){
            session_start();
        }
        $sessionCheck = isset($_SESSION['ID_USER']);
        return $sessionCheck;
    }

    function list(){
        $sessionCheck = $this->sessionCheck();
        $products = $this->model->getGenresFromProducts();
        $genres = $this->genreModel->getGenres();
        $this->view->showProducts($products, $sessionCheck, $genres);
    }

    function showGenres($error=""){
        $sessionCheck = $this->sessionCheck();
        $genres = $this->genreModel->getGenres();
        $this->view->showGenres($genres, $sessionCheck, $error);
    }
    
    function getProductsByGenre($id){
        $genre = $this->genreModel->getGenre($id);
        $products = $this->model->getProductsByGenre($id);
        $this->view->showProductsByGenre($products, $genre);
    }

    function createProduct(){
       $this->model->insertProduct($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
       $this->list();
    }
    
    function updateProduct(){
        $this->helper->checkLoggedIn();
        $this->model->updateProduct($_POST['id_producto'],$_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
        $this->list();
    }

    function deleteProduct($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteProduct($id);
        $this->list();
    }
    
    function showEditProduct($id){
        $this->helper->checkLoggedIn();
        $product = $this->model->getProduct($id);
        $genres = $this->genreModel->getGenres();
        $this->view->showEditProduct($id, $genres);
    }
       
    function details($id){
        $product = $this->model->getProduct($id);
        $this->view->showDetails($product);
    }

    function createGenre(){
        $this->genreModel->insertGenre($_POST['id_genero'], $_POST['genre']);
        $this->showGenres();
    }
 
    function deleteGenre($id){
        $this->helper->checkLoggedIn();        
        if($this->model->getProductsByGenre($id)==true){
            $error = 'No se puede eliminar un género que tiene un juego asignado!';
            $this->showGenres($error);
        }else{
            $this->genreModel->deleteGenre($id);
            $this->showGenres();
        }
    }
     
    function updateGenre(){
        $this->helper->checkLoggedIn();
        $this->genreModel->updategr($_POST['id_genero'], $_POST['genre']);
        $this->showGenres();
    }
    
    function showEditGenre($id){
        $this->helper->checkLoggedIn();
        $genre = $this->genreModel->getGenre($id);
        $this->view->showEditGenre($id, $genre);
    }
    
    function home(){
        $sessionCheck = $this->sessionCheck();
        $adminCheck = $this->loginController->checkAdmin();
        // var_dump();
        $boolAdmin = filter_var($adminCheck, FILTER_VALIDATE_BOOLEAN);
        // var_dump($sessionCheck);
        $this->view->showHome($sessionCheck, $adminCheck);
    }
        
}