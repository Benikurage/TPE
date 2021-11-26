<?php 

require_once "./model/GenreModel.php";
require_once "./model/ProductModel.php";
require_once "./model/CommentsModel.php";
require_once "./model/UserModel.php";
require_once "./view/ListView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./controller/LoginController.php";

class ListController{

    private $model;
    private $genreModel;
    private $commentsModel;
    private $userModel;
    private $view;
    private $helper;
    private $loginController;

    function __construct(){
        $this->model = new ProductModel();
        $this->genreModel = new GenreModel();
        $this->commentsModel = new CommentsModel();
        $this->userModel = new UserModel();
        $this->loginController = new LoginController();
        $this->view = new ListView();
        $this->helper = new AuthHelper();
    }
    
    function sessionCheck(){
        if(!isset($_SESSION['_SESSION'])){
            session_start();
        }
        $sessionCheck = isset($_SESSION['ID_USER']);
        return $sessionCheck;
    }

    function list(){
        $products = $this->model->getGenresFromProducts();
        $adminCheck = $this->loginController->checkAdmin();
        $genres = $this->genreModel->getGenres();
        $this->view->showProducts($products, $adminCheck, $genres);
    }

    function showGenres($error=""){
        $adminCheck = $this->loginController->checkAdmin();
        $genres = $this->genreModel->getGenres();
        $this->view->showGenres($genres, $adminCheck, $error);
    }
    
    function getProductsByGenre($id){
        $genre = $this->genreModel->getGenre($id);
        $products = $this->model->getProductsByGenre($id);
        $this->view->showProductsByGenre($products, $genre);
    }
    
    function createProduct(){
        $this->helper->checkLoggedIn();
        if ($this->verifyComment()==true) 
            $this->model->insertProduct($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
            $this->list();
    }

    function updateProduct(){
        $this->helper->checkLoggedIn();
        if ($this->verifyComment()==true) 
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
        $genres = $this->genreModel->getGenres();
        $this->view->showEditProduct($id, $genres);
    }
       
    function getLoggedUser(){
        if(isset($_SESSION['ID_USER'])){
            $id = $_SESSION['ID_USER'];
            $user = $this->userModel->getUser($id);
            return $user;
        }
    }
    
    function details($id){
        $product = $this->model->getProduct($id);
        if ($product==true) {
            $comments = $this->commentsModel->getComments();
            $sessionCheck = $this->sessionCheck();
            $user = $this->getLoggedUser();
            $adminCheck = $this->loginController->checkAdmin();
            $this->view->showDetails($product, $comments, $user, $sessionCheck, $adminCheck);
        } else {
            echo('Ese juego no existe.');
        }
    }

    function createComment(){
        if ($this->verifyComment()==true) 
            $this->commentsModel->insertComment($_POST['comentario'], $_POST['username'], $_POST['id_producto'], $_POST['puntaje']);
    }

    function createGenre(){
        if ($this->verifyGenre()==true)
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
        if ($this->verifyGenre()==true) 
            $this->genreModel->updateGenre($_POST['id_genero'], $_POST['genre']);
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
        $this->view->showHome($sessionCheck, $adminCheck);
    }

    function verifyProduct(){
        return isset($_POST['comentario'], $_POST['username'], $_POST['id_producto'], $_POST['puntaje']);
    }

    function verifyGenre(){
        return isset($_POST['id_genero'], $_POST['genre']);
    }

    function verifyComment(){
        return isset($_POST['comentario'], $_POST['username'], $_POST['id_producto'], $_POST['puntaje']);
    }
   
}