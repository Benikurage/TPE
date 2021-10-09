<?php 

require_once "./model/model.php";
require_once "./view/view.php";
require_once "./Helpers/AuthHelper.php";

class Controller{

    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }

    function home(){
        $productos = $this->model->getproducts();
        $this->view->showProducts($productos);
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
        $producto = $this->model->getproduct($id);
        $this->view->mostrarDetalles($producto);
    }

    function genero(){
        //$producto = $this->model->getproduct($id);
        $this->view->mostrarGenero();
    }

    function inicio(){
        //$producto = $this->model->getproduct($id);
        $this->view->mostrarInicio();
    }
    
}