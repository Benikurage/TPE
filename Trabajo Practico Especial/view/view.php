//imprimir tabla
<!-- foreach($pagos as $pago){
    echo "$pago->deudor(cuota nro: $pago->cuota)";
} -->
<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class View {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showproducts($productos){
        $this->smarty->assign('titulo', 'Lista de productos');        
        $this->smarty->assign('productos', $productos);

        $this->smarty->display('template/list.tpl');
    }

    function showproduct($producto){
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('template/detail.tpl');
     }

    function HomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}