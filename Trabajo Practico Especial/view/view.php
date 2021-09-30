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

    function showTasks($tasks){
        $this->smarty->assign('titulo', 'Lista de tareas');        
        $this->smarty->assign('tasks', $tasks);

        $this->smarty->display('template/list.tpl');
    }

    function showTask($task){
        $this->smarty->assign('task', $task);
        $this->smarty->display('template/detail.tpl');
     }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}