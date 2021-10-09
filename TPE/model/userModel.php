<?php
class UserModel{

    private $db;
    function __construct(){
        $this->db = new PDO('uwu');
    }
    function getUser($email){

        $db = new PDO('mysql:host=localhost;'.'dbname=usuario;charset=utf8', 'root', '');
        $query = $this->db->prepare('SELECT * FROM users WHERE user = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
