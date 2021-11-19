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
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['EMAIL'] = $user->email;
        return $sessionCheck = true;
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
            //llamado al model
            $this->model->createUser($nombre, $email, $password);
            //inicio sesión
            $user = $this->model->getUser($email);
            $this->startSession($user); 
            //llamado al view
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

    //admin   
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

    function giveAdmin($id){
        $this->adminSecurity();
        $this->model->assignAdmin($id, 1);
        $this->showListAdmin();
    }

    function removeAdmin($id){
        $this->adminSecurity();
        $this->model->assignAdmin($id, 0);
        $this->showListAdmin();
    }
    
    function toggleAdmin($id){
        $this->adminSecurity();
        $admin = $this->model->checkAdminById($id);
        var_dump($admin);
        // $this->model->assignAdmin($id, 0);
        // if($admin=="1"){
        //         var_dump($admin);
        // }
    }
}