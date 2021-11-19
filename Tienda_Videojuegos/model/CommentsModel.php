<?php

class CommentsModel {
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charse=utf8','root','');
    }

    public function getComments(){
        $query = $this->db->prepare("SELECT * FROM comentarios");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getComment($id){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getUserComment($id){
        $query = $this->db->prepare('SELECT * FROM comentarios  WHERE id_producto=? ORDER BY id_comentario DESC ');
        $query->execute(array($id));
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function insertComment($comentario,$username,$id_producto,$puntaje){
        $query = $this->db->prepare('INSERT INTO comentarios(comentario,username,id_producto,puntaje) VALUES(?,?,?,?)');
        $query->execute([$comentario,$username,$id_producto,$puntaje]);
    }

    public function deleteComment($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($id));
    }

}