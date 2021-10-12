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
    }

    function list(){
        $productos = $this->model->getProducts();
        $this->view->showProducts($productos);
    }

    //crear funcion para mostrar listado de generos
    function listCategory(){
        $genero = $this->model->getGenres();
        $this->view->mostrarGenero($genero);
    }

    function create(){
        if(!isset($_POST['done'])){
            $done = 0;
        }else{
            $done = 1;
        }
       $this->model->insert($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $done);
       $this->view->homeLocation();
    }

    function delete($id){
        $this->helper->checkLoggedIn();
        $this->model->deletedb($id);
        $this->view->homeLocation();
    }
    
    function update(){
        $this->helper->checkLoggedIn();
        $this->model->updatedb($_POST['idProducto'],$_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
        $this->view->homeLocation();
    }

    //function view($id){
    //    $producto = $this->model->getproduct($id);
    //    $this->view->showproduct($producto);
    //}

    function mostrarEditar($id){
        $this->helper->checkLoggedIn();
        $producto = $this->model->getproduct($id);
        $this->view->mostrarEditar($id, $producto);
    }

    function detalles($id){
        $producto = $this->model->getProduct($id);
        $this->view->mostrarDetalles($producto);
    }
    

    //function genero(){
    //    //$producto = $this->model->getproduct($id);
    //    $this->view->mostrarGenero();
    //}

    function inicio(){
        //$producto = $this->model->getproduct($id);
        $this->view->mostrarInicio();
    }
    
}