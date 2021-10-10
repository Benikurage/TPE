<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
require_once './controller/ListController.php';
class ListView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showProducts($productos){
        $this->smarty->assign('titulo', 'Lista de productos');        
        $this->smarty->assign('productos', $productos);

        session_start();
        if(isset($_SESSION['ID_USER']) && $_SESSION['ID_USER']==true){
           $this->smarty->display('template/listPrivate.tpl');
        } else{
            $this->smarty->display('template/listPublic.tpl');
        }
    }
    function mostrarCategorias(){
        
    
    }
    // function showProduct($producto){
    //   $this->smarty->assign('producto', $producto);
    //    $this->smarty->display('template/detail.tpl');
    // }
    function mostrarDetalles($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/detail.tpl');
    }
            
    //idem linea 14
    function mostrarEditar($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/mostrarEditarProducto.tpl');
    }

    function mostrarGenero(){
        $this->smarty->assign('titulo', 'Lista de genero');
        $this->smarty->display('template/genero.tpl');
    }

    function mostrarInicio($error=""){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Inicio');
        $this->smarty->display('template/inicio.tpl');
    }

    //crear funcion de logueo con todo loque requiera
    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}