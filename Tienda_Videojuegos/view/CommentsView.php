<?php 
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
require_once './controller/ApiController.php';

class ListView{
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function getComments($comments){
        $this->smarty->assign('titulo', 'Comentarios');        
        $this->smarty->assign('comentarios', $comments);
        $this->smarty->display('templates/detail.tpl');
    }
}