<?php

require_once "./view/LoginView.php";
require_once "./view/ListView.php";
require_once "./model/UserModel.php";
require_once "./model/CommentsModel.php";

class LoginController{
    private $model;
    private $view;
    private $listView;

    function __construct(){
        $this->model = new UserModel();
        $this->commentsModel = new CommentsModel();
        $this->view = new LoginView();
        $this->listView = new listView();
    }
    
    function refreshSession(){
        if(!isset($_SESSION)){ 
            session_start(); 
        }
    }

    function startSession($user){
        $this->refreshSession();
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
            $user = $this->model->getUserByMail($email);
        }

        if($user && password_verify($password, $user->password)){
            $sessionCheck = $this->startSession($user); 
            $adminCheck = $this->checkAdmin();
            $this->listView->showHome($sessionCheck, $adminCheck, "Usuario Logueado!");
        }else{
            $this->view->showLogin("Usuario o contraseña incorrecta!");
        }

    }
    
    function newUser(){
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            try {
                $this->model->createUser($nombre, $email, $password);
                $user = $this->model->getUserByMail($email);
                $sessionCheck = $this->startSession($user); 
                $adminCheck = false;
                $this->listView->showHome($sessionCheck, $adminCheck, "Usuario creado!");
            } catch (\Throwable $th) {
                $this->view->showSignUpForm("Ese nombre no está disponible!");
            }
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
        $this->refreshSession();

        if(isset($_SESSION['ID_USER'])){
            $userId = $_SESSION['ID_USER'];
            $user = $this->model->getUser($userId);
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
        $admin = $this->checkAdmin();
        $users = $this->model->getUsers();
        $this->view->showUserList($users, $admin);
    }

    function deleteUser($id){
        $this->adminSecurity();
        $adminCheck = $this->checkAdmin();
        $this->refreshSession();
        $sessionCheck = isset($_SESSION['ID_USER']);
        $idCheck = $this->verifyUserById($id);
        $currentUserCheck = $this->getCurrentUserId();

        if ($currentUserCheck==$id){
            $this->listView->showHome($sessionCheck, $adminCheck, 'No podés borrar tu usuario mientras está logueado.');
        } else if ($idCheck==true && $idCheck==$id){
            $this->model->deleteUser($id);
            $this->showListAdmin();
        } else {
            $this->listView->showHome($sessionCheck, $adminCheck, 'Ese usuario no existe.');
        }
    }

    function toggleAdmin($id){
        $this->adminSecurity();
        $adminCheck = $this->checkAdmin();
        
        $this->refreshSession();
        $sessionCheck = isset($_SESSION['ID_USER']);
        
        $idCheck = $this->verifyUserById($id);

        if ($idCheck && $sessionCheck && $adminCheck) {
            $user = $this->model->checkAdminById($id);
            $admin = $user->admin;
            $currentUserCheck = $this->getCurrentUserId();

            if($admin==true && $id==$currentUserCheck){
                $this->listView->showHome($sessionCheck, $adminCheck, 'No podés quitarte admin a vos mismo.');
            } else if($admin==true){
                $this->model->assignAdmin($id, false);
                $this->showListAdmin();
            } else if ($admin==false){
                $this->model->assignAdmin($id, true);
                $this->showListAdmin();
            }
        } else {
            $this->listView->showHome($sessionCheck, $adminCheck, 'Ese usuario no existe.');
        }
    }

    function verifyUserById($id){
        if (isset($id))
            $user = $this->model->getUser($id);
            return $user->id_usuario;
    }

    function getCurrentUserId(){
        if (isset($_SESSION['ID_USER'])){
            return $_SESSION['ID_USER'];
        }
    }
}