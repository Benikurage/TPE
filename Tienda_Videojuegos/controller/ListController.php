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
        $this->loginController->refreshSession();
        $sessionCheck = isset($_SESSION['ID_USER']);
        return $sessionCheck;
    }

    function list(){
        $adminCheck = $this->loginController->checkAdmin();
        $products = $this->model->getGenresFromProducts();
        $genres = $this->genreModel->getGenres();
        $this->view->showProducts($products, $adminCheck, $genres);
    }

    function showGenres($error=""){
        $adminCheck = $this->loginController->checkAdmin();
        $genres = $this->genreModel->getGenres();
        $this->view->showGenres($genres, $adminCheck, $error);
    }
    
    function getProductsByGenre($id){
        $verify = $this->verifyGenreById($id);
        if ($verify == true) {
            $genre = $this->genreModel->getGenre($id);
            $products = $this->model->getProductsByGenre($id);
            $this->view->showProductsByGenre($products, $genre);
        } else {
            $this->homeError('Ese género no existe');
        }
    }
    
    function createProduct(){
        $this->helper->checkLoggedIn();
        
        if ($this->verifyProduct()==true) 
            $this->model->insertProduct($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
            $this->list();
    }

    function updateProduct(){
        $this->helper->checkLoggedIn();
        if ($this->verifyProduct()==true) 
            $this->model->updateProduct($_POST['id_producto'],$_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
            $this->list();
    }

    function deleteProduct($id){
        $this->helper->checkLoggedIn();
        $verify = $this->verifyProductById($id);
        if ($verify==true){
            $this->model->deleteProduct($id);
            $this->list();
        } else {
            $this->homeError('Ese juego no existe');
        }
    }
    
    function showEditProduct($id){
        $this->helper->checkLoggedIn();
        $verify = $this->verifyProductById($id);
        if ($verify==true) {
            $genres = $this->genreModel->getGenres();
            $this->view->showEditProduct($id, $genres);
        } else {
            $this->homeError('Ese juego no existe');
        }
    }
       
    function getLoggedUser(){
        $this->loginController->refreshSession();
        if(isset($_SESSION['ID_USER'])){
            $id = $_SESSION['ID_USER'];
            $user = $this->userModel->getUser($id);
            return $user;
        }
    }
    function getLoggedUsername(){
        $user = $this->getLoggedUser();
        if ($user==true) {
            $username = $user->nombre;
            return $username ;
        } else {
            return null;
        }
    }

    function details($id){
        $product = $this->verifyProductById($id);
        if ($product==true) {
            $adminCheck = $this->loginController->checkAdmin();
            $sessionCheck = $this->sessionCheck();
            $comments = $this->commentsModel->getComments($id);
            $username = $this->getLoggedUsername();
            $this->view->showDetails($product, $comments, $username, $sessionCheck, $adminCheck);
        } else {
            $this->homeError('Ese juego no existe');
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
        $verify = $this->verifyGenreById($id);
        if ($verify == true) {
            if($this->model->getProductsByGenre($id)==true){
                $this->showGenres('No se puede eliminar un género que tiene un juego asignado!');
            }else{
                $this->genreModel->deleteGenre($id);
                $this->showGenres();
            }
        } else {
            $this->homeError('Ese género no existe'); 
        }
    }

    function updateGenre(){
        $this->helper->checkLoggedIn();
        if ($this->verifyGenre()==true){ 
            $this->genreModel->updateGenre($_POST['id_genero'], $_POST['genre']);
            $this->showGenres();
        } else {
            $this->homeError('Ese género no existe');
        }
    }

    function showEditGenre($id){
        $this->helper->checkLoggedIn();
        $verify = $this->verifyGenreById($id);
        if ($verify == true) {
            $genre = $this->genreModel->getGenre($id);
            $this->view->showEditGenre($id, $genre);
        } else {
            $this->homeError('Ese género no existe');
        }
    }
    
    function home(){
        $sessionCheck = $this->sessionCheck();
        $adminCheck = $this->loginController->checkAdmin();
        $this->view->showHome($sessionCheck, $adminCheck);
    }

    function verifyProduct(){
        return isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['genero']);
    }

    function verifyGenre(){
        return isset($_POST['genre']);
    }

    function verifyComment(){
        return isset($_POST['comentario'], $_POST['username'], $_POST['id_producto'], $_POST['puntaje']);
    }

    function verifyProductById($id){
        if (isset($id))
            $product = $this->model->getProduct($id);
            return $product;
    }

    function verifyGenreById($id){
        if (isset($id))
            $genre = $this->genreModel->getGenre($id);
            return $genre;
    }
   
    function homeError($error=''){
        $sessionCheck = $this->sessionCheck();
        $adminCheck = $this->loginController->checkAdmin();
        $this->view->showHome($sessionCheck, $adminCheck, $error);
    }

    function showFilteredProducts() {
        $adminCheck = $this->loginController->checkAdmin();
        $genres = $this->genreModel->getGenres();

        if (isset($_POST['filter'], $_POST['search-field'])) {
            $filter = $_POST['filter'];
            $search = $_POST['search-field'];
            $search = "%".$search."%";
            $products = $this->model->getFilteredProducts($filter, $search);
        } else {
            $products = $this->model->getGenresFromProducts();
        }
        $this->view->showProducts($products, $adminCheck, $genres);
    }

}
