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

    // function showLogout($sessionCheck, $error=""){
    //     $this->smarty->assign('sessionCheck', $sessionCheck);

    //     $this->smarty->assign('error', $error);
    //     $this->smarty->assign('titulo', 'Inicio');

    //     $this->smarty->display('template/inicio.tpl');
    // }
    
    function showSignUpForm(){
        $this->smarty->display('template/registro.tpl');
    }

    //es la misma funcion en listView...
    // function showHome($error=""){

    //     // $this->smarty->assign('sessionCheck', true);
    //     $this->smarty->assign('error', $error);
    //     $this->smarty->assign('titulo', 'Inicio');
    //     $this->smarty->display('template/inicio.tpl');
    // }

    function showUserList($users){
        // $this->smarty->assign('adminCheck', $adminCheck);
        $this->smarty->assign('usuarios', $users);   
        $this->smarty->display('template/listaUsuarios.tpl');
    }

}