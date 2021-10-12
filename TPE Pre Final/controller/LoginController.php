<?php

require_once "./view/LoginView.php";
require_once "./model/UserModel.php";

class LoginController{
    private $model;
    private $view;

    function __construct(){
        $this->model= new UserModel();
        $this->view = new LoginView();
    }
    
    function newUser(){
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->createUser($nombre, $email, $password);
            $this->view->showLogout("Usuario creado!");
        }
    }

    function login(){
        $this->view->showLogin();
    }
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogout("Te deslogueaste");
    }

    function verifyLogin(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password= $_POST['password'];
            $user = $this->model->getUser($email);
        }
        
        if($user && password_verify($password, $user->password)){
            
            session_start();
            $_SESSION['ID_USER']=$user->id_usuario;
            $_SESSION['EMAIL']=$user->email;

            $this->view->showHome();
        }else{
            $this->view->showLogin();
        }
    }
    function registro(){
        $this->view->mostrarRegistro();
    }
}