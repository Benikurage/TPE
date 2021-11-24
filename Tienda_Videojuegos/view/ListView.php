<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
require_once './controller/ListController.php';

class ListView{
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showProducts($products, $adminCheck,  $genres=""){
        $this->smarty->assign('titulo', 'Lista de productos'); 
        $this->smarty->assign('adminCheck', $adminCheck);   
        $this->smarty->assign('productos', $products);   
        $this->smarty->assign('generos', $genres);   
        $this->smarty->display('template/listPrivate.tpl');
    }

    function showGenres($products, $sessionCheck=false,  $error=""){
        $this->smarty->assign('titulo', 'Lista de géneros');        
        $this->smarty->assign('sessionCheck', $sessionCheck);
        $this->smarty->assign('productos', $products);
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/listaDeGeneros.tpl');
    }

    function showProductsByGenre($products, $genre){
        $this->smarty->assign('genero', $genre);        
        $this->smarty->assign('productos', $products);
        $this->smarty->display('template/listaDeProductosPorGenero.tpl');
    }

    function showDetails($product, $comments, $user="", $sessionCheck=false, $adminCheck=false){
        $this->smarty->assign('producto', $product);
        $this->smarty->assign('comentarios', $comments);
        $this->smarty->assign('usuario', $user);
        $this->smarty->assign('sessionCheck', $sessionCheck);
        $this->smarty->assign('adminCheck', $adminCheck);
        $this->smarty->display('template/detail.tpl');
    }

    function showEditProduct($id, $genres){
        $this->smarty->assign('generos', $genres);   
        $this->smarty->assign('producto', $id);
        $this->smarty->display('template/mostrarEditarProducto.tpl');
    }
    
    function showHome($sessionCheck=false, $adminCheck=false, $error=""){
        $this->smarty->assign('sessionCheck', $sessionCheck);
        $this->smarty->assign('adminCheck', $adminCheck);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Inicio');
        $this->smarty->display('template/inicio.tpl');
    }
    
    function showEditGenre($genre){
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('template/mostrarEditarGenre.tpl');
    }
    
    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}