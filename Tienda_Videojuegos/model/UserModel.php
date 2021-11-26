<?php
class UserModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos; charset=utf8', 'root', '');
    }
    
    function createUser($nombre, $email, $password, $admin=0){
        $query = $this->db->prepare('INSERT INTO usuario(nombre, email, password, admin) VALUES(?,?,?,?)');
        $query->execute(array($nombre, $email, $password, $admin));
    }

    function getUser($id){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE id_usuario = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    function getUserByMail($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function checkAdminById($id){
        $query = $this->db->prepare('SELECT `admin` FROM usuario WHERE id_usuario = ?');
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function deleteUser($id){
        try {
            $query = $this->db->prepare("DELETE FROM `usuario` WHERE `id_usuario` = ?");
            $query->execute(array($id));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function assignAdmin($id, $admin){
        $query = $this->db->prepare("UPDATE `usuario` SET `admin` = ? WHERE `id_usuario` = ?");
        $query->execute(array($admin, $id));
    }
    
}