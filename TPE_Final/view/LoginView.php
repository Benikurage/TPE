<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty= new Smarty();
    }

    function showLogin(){
        $this->smarty->display('template/login.tpl');
    }

    function showLogout($error=""){
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/inicio.tpl');
    }
    
    function showHome(){
        header("Location: ".BASE_URL."home");
    }
    
    function mostrarRegistro(){
        $this->smarty->display('template/registro.tpl');
    }

}