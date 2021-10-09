<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
require_once './controller/controller.php';
class View {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showproducts($productos){
        $this->smarty->assign('titulo', 'Lista de productos');        
        $this->smarty->assign('productos', $productos);
        //hacer un if para que el display del tipo de lista dependa de si la sesión está o no iniciada
        $this->smarty->display('template/listPrivate.tpl');
    }

    //function showproduct($producto){
    //   $this->smarty->assign('producto', $producto);
    //    $this->smarty->display('template/detail.tpl');
    //}
    function mostrardetalles($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/detail.tpl');
    }
            
    //idem linea 14
    function mostrareditar($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/mostraridetarproducto.tpl');
    }

    function mostrargenero($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/categoria.tpl');
    }
    //crear funcion de logueo con todo loque requiera
    function HomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}