<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
require_once './controller/ListController.php';
class ListView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showProducts($productos, $generos=""){
        $this->smarty->assign('titulo', 'Lista de productos');  
        $this->smarty->assign('productos', $productos);   
        $this->smarty->assign('generos', $generos);   
        if(!isset($_SESSION['ID_USER'])){
            session_start();
        }
        if(isset($_SESSION['ID_USER']) && $_SESSION['ID_USER']==true){
            $this->smarty->display('template/listPrivate.tpl');
        }else{
            $this->smarty->display('template/listPublic.tpl');
        }
        //session_start();
        // if(isset($_SESSION['EMAIL'])){
        //     $this->smarty->assign('logged', $_SESSION['EMAIL']);
        // }        
        // $this->smarty->display('template/listPrivate.tpl');
    }

    function mostrarCategorias($productos, $error=""){
        if(!isset($_SESSION['ID_USER'])){
            session_start();
        }
        if(isset($_SESSION['ID_USER'])){
            $this->smarty->assign('logged', $_SESSION['ID_USER']);
        }
        $this->smarty->assign('titulo', 'Lista de géneros');        
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/listaDeGeneros.tpl');
    }

    function mostrarJuegosPorCategoria($productos, $genero){
        $this->smarty->assign('genero', $genero);        
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('template/listaDeProductosPorGenero.tpl');
    }

    function mostrarDetalles($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/detail.tpl');
    }
    
    function mostrarEditar($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/mostrarEditarProducto.tpl');
    }
    
    function mostrarInicio($error=""){
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $this->smarty->assign('logged', $_SESSION['ID_USER']);
        }
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Inicio');
        $this->smarty->display('template/inicio.tpl');
    }
    
    function mostrarEditargr($genre){
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('template/mostrarEditarGenre.tpl');
    }
    
    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}