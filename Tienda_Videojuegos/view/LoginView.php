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

    function showSignUpForm(){
        $this->smarty->display('template/registro.tpl');
    }

    function showUserList($users){
        $this->smarty->assign('usuarios', $users);   
        $this->smarty->display('template/listaUsuarios.tpl');
    }

}