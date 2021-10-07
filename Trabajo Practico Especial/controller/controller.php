<?php 
require_once "./model/model.php";
require_once "./view/view.php";

class Controller{

    private $model;
    private $view;

    function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }

    function Home(){
        $productos = $this->model->getproducts();
        $this->view->showproducts($productos);
    }

    function create(){
        if(!isset($_POST['done'])){
            $done = 0;
        }else{
            $done = 1;
        }
       $this->model->insert($_POST['title'], $_POST['description'], $_POST['priority'], $done);
       $this->view->HomeLocation();
    }

    function delete($id){
        $this->model->deletedb($id);
        $this->view->HomeLocation();
    }
    
    function update(){
        $this->model->updatedb($_POST['idProducto'],$_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
        $this->view->HomeLocation();
    }

    function view($id){
        $producto = $this->model->getproduct($id);
        $this->view->showproduct($producto);
    }
    function mostrareditar($id){
        $producto = $this->model->getproduct($id);
        $this->view->mostrareditar($id, $producto);
    }
    
}