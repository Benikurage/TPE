<?php 

require_once "./model/ListModel.php";
require_once "./view/ListView.php";
require_once "./Helpers/AuthHelper.php";

class ListController{

    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new ListModel();
        $this->view = new ListView();
        $this->helper = new AuthHelper();
    }

    function list(){
        $inner = $this->model->getInner();
        $generos = $this->model->getGenres();
        $this->view->showProducts($inner, $generos);
    }

    function listCategory(){
        $categories = $this->model->getGenres();
        $this->view->mostrarCategorias($categories);
    }
    
    function listGamesByGenre($id){
        $genero = $this->model->getGenre($id);
        $categories = $this->model->getGamesByGenre($id);
        $this->view->mostrarJuegosPorCategoria($categories, $genero);
    }

    // function genero(){
    //     $generos = $this->model->getGenres();
    //     $this->view->mostrarGenero($generos);
    // }

    function create(){
        // if(!isset($_POST['done'])){
        //     $done = 0;
        // }else{
        //     $done = 1;
        // }
    //    $this->model->insert($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
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

    function CreateGenre(){
        $this->model->insertgenero($_POST['id_genero'], $_POST['genre']);
        $this->listCategory();
    }
 
    function deleteGenre($id){
        $this->helper->checkLoggedIn();
        try {
            $this->model->deletegr($id);
            $this->listCategory();
        } catch (\Throwable $error) {
            $this->listCategory($error);
        }
    }
     
    function updateGenre(){
        $this->helper->checkLoggedIn();
        $this->model->updategr($_POST['id_genero'], $_POST['genre']);
        $this->listCategory();
    }
    
    function mostrarEditarGenre($id){
        $this->helper->checkLoggedIn();
        $genero = $this->model->getGenre($id);
        $this->view->mostrarEditargr($id, $genero);
    }
    
    function inicio(){
        $this->view->mostrarInicio();
    }
        
    //function view($id){
        //    $producto = $this->model->getproduct($id);
        //    $this->view->showproduct($producto);
        //}
        
}