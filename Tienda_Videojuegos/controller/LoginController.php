<?php

require_once "./view/LoginView.php";
require_once "./model/UserModel.php";

class LoginController{
    private $model;
    private $view;
    private $helper;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }
    
    function startSession($user){
        session_start();
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
            $this->view->showHome($sessionCheck, "Te logueaste!");
        }else{
            $this->view->showLogin();
        }

    }
    
    function newUser(){
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $sessionCheck = true;
            //llamado al model
            $this->model->createUser($nombre, $email, $password);
            //inicio sesión
            $user = $this->model->getUser($email);
            $this->startSession($user); 
            //llamado al view
            $this->view->showHome($sessionCheck, "Usuario creado!");
        }
    }

    function login(){
        $this->view->showLogin();
    }
    
    function logout(){
        session_start();
        session_destroy();
        $sessionCheck=false;
        $this->view->showLogout($sessionCheck, "Te deslogueaste");
    }
    
    function signUpForm(){
        $this->view->showSignUpForm();
    }

    function deleteUser($id){
        $this->helper->checkLoggedIn();
        $this->model->deleteUser($id);
        showListAdmin();
    }
    
    //admin

    function checkAdmin(){
        if(isset($_SESSION['EMAIL'])){
            $email = $_SESSION['EMAIL'];
            $admin = $this->model->checkAdmin($email);
        }
        return $admin;
    }

    function showListAdmin(){
        $admin = checkAdmin();
        $users = $this->model->getUsers();

        if($admin=true){
            $this->view->showUserList($users);
        }else{
            $this->view->showHome();
        }
    }

    function toggleAdmin($id){
        $admin = checkAdmin();
        if($admin=true){
            $this->model->assignAdmin($id, false);
        } else {
            $this->model->assignAdmin($id, true);
        }
        showListAdmin();
    }

}