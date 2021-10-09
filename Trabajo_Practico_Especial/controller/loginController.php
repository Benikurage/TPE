<?php

require_once "./view/loginView.php";
require_once "./model/userModel.php";

class LoginController{
    private $model;
    private $view;

    function __construct(){
        $this->model= new UserModel();
        $this->view = new LoginView();
    }
    function login(){
        $this->view->showLogin();
    }
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste");
    }
    function verifyLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password= $_POST['password'];
            $user = $this->model->getUser($email);

        }
        
        if($user && password_verify($password, $user->password)){
            
            session_start();
            $_SESSION['ID_USER']=$user->id;
            $_SESSION['EMAIL']=$user->email;

            $this->view->showHome();
        }else{
            $this->view->showLogin("Acceso denegado");
        }
    }
}