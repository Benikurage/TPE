<?php 

require_once "./model/GenreModel.php";
require_once "./model/ProductModel.php";
require_once "./view/ListView.php";
require_once "./Helpers/AuthHelper.php";

class ListController{

    private $model;
    private $genreModel;
    private $view;
    private $helper;

    function __construct(){
        $this->genreModel = new GenreModel();
        $this->model = new ProductModel();
        $this->view = new ListView();
        $this->helper = new AuthHelper();
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
        $inner = $this->model->getGenresFromProducts();
        $generos = $this->genreModel->getGenres();
        $this->view->showProducts($inner, $sessionCheck, $generos);
    }

    function listCategory($error=""){
        $sessionCheck = $this->sessionCheck();
        $categories = $this->genreModel->getGenres();
        $this->view->mostrarCategorias($categories, $sessionCheck, $error);
    }
    
    function getProductsByGenre($id){
        $genero = $this->genreModel->getGenre($id);
        $categories = $this->model->getProductsByGenre($id);
        $this->view->mostrarJuegosPorCategoria($categories, $genero);
    }

    function create(){
       $this->model->insert($_POST['nombre'], $_POST['descripcion'], $_POST['precio'],$_POST['genero']);
       $this->list();
    }
    
    function update(){
        $this->helper->checkLoggedIn();
        $this->model->updatedb($_POST['id_producto'],$_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
        $this->list();
    }

    function delete($id){
        $this->helper->checkLoggedIn();
        $this->model->deletedb($id);
    }
    
    function mostrarEditar($id){
        $this->helper->checkLoggedIn();
        $producto = $this->model->getproduct($id);
        $this->view->mostrarEditar($id, $producto);
    }
       
    function detalles($id){
        $producto = $this->model->getproduct($id);
        $this->view->mostrarDetalles($producto);
    }

    function createGenre(){
        $this->genreModel->insertgenero($_POST['id_genero'], $_POST['genre']);
        $this->listCategory();
    }
 
    function deleteGenre($id){
        $this->helper->checkLoggedIn();        
        if($this->model->getProductsByGenre($id)==true){
            $error = 'No se puede eliminar un género que tiene un juego asignado!';
            $this->listCategory($error);
        }else{
            $this->genreModel->deletegr($id);
            $this->listCategory();
        }
    }
     
    function updateGenre(){
        $this->helper->checkLoggedIn();
        $this->genreModel->updategr($_POST['id_genero'], $_POST['genre']);
        $this->listCategory();
    }
    
    function mostrarEditarGenre($id){
        $this->helper->checkLoggedIn();
        $genero = $this->genreModel->getGenre($id);
        $this->view->mostrarEditargr($id, $genero);
    }
    
    function inicio(){
        $sessionCheck = $this->sessionCheck();
        $this->view->mostrarInicio($sessionCheck);
    }
        
}