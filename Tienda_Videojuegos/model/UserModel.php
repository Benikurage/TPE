<?php
class UserModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos; charset=utf8', 'root', '');
    }
    
    function createUser($nombre, $email, $password){
        $query = $this->db->prepare('INSERT INTO usuario(nombre, email, password) VALUES(?,?,?)');
        $query->execute(array($nombre, $email, $password));
    }

    function getUser($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}
