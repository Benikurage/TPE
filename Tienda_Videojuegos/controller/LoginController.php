<?php

require_once "./view/LoginView.php";
require_once "./view/ListView.php";
require_once "./model/UserModel.php";

class LoginController{
    private $model;
    private $view;
    private $listView;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->listView = new listView();
    }
    
    function startSession($user){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['EMAIL'] = $user->email;
        return true;
    }

    function verifyLogin(){

        if(empty($user)){
            $user = null;
        }

        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);
        }

        if($user && password_verify($password, $user->password)){
            $sessionCheck = $this->startSession($user); 
            $adminCheck = $this->checkAdmin();
            $this->listView->showHome($sessionCheck, $adminCheck, "Usuario Logueado!");
        }else{
            $this->view->showLogin();
        }

    }
    
    function newUser(){
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            $this->model->createUser($nombre, $email, $password);

            $user = $this->model->getUser($email);
            $this->startSession($user); 

            $this->listView->showHome("Usuario creado!");
        }
    }

    function login(){
        $this->view->showLogin();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $sessionCheck = false;
        $adminCheck = false;
        $this->listView->showHome($sessionCheck, $adminCheck, "Te deslogueaste");
    }
    
    function signUpForm(){
        $this->view->showSignUpForm();
    }

    function checkAdmin(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if(isset($_SESSION['EMAIL'])){
            $email = $_SESSION['EMAIL'];
            $user = $this->model->getUser($email);
            if($user->admin==true){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getUsernameByMail($email){
        if(!isset($_SESSION['ID_USER'])){
            session_start();
        }
        if (isset($_SESSION['EMAIL'])) {
            $email = $_SESSION['EMAIL'];
        }
        $user = $this->model->getUser($email);
        return $user->nombre;
    }

    function adminSecurity(){
        $admin = $this->checkAdmin();
        if($admin==false){
            header("Location: ".BASE_URL."home");
        }
    }

    function showListAdmin(){
        $this->adminSecurity();
        $users = $this->model->getUsers();
        $this->view->showUserList($users);
    }

    function deleteUser($id){
        $this->adminSecurity();
        $this->model->deleteUser($id);
        $this->showListAdmin();
    }

    function toggleAdmin($id){
        $this->adminSecurity();
        $user = $this->model->checkAdminById($id);
        $admin = $user->admin;

        if($admin==true){
            $this->model->assignAdmin($id, false);
        } else if ($admin==false){
            $this->model->assignAdmin($id, true);
        } else {
            echo "error";
        }
        $this->showListAdmin();
    }
}