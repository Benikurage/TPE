<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';
class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty= new Smarty();
    }

    function showLogin($error=''){
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/login.tpl');
    }

    function showSignUpForm($error=''){
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/registro.tpl');
    }

    function showUserList($users, $admin=false){
        $this->smarty->assign('usuarios', $users);   
        $this->smarty->assign('admin', $admin);   
        $this->smarty->display('template/listaUsuarios.tpl');
    }

}