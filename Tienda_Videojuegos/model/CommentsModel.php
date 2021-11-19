<?php

class CommentsModel {
    
    private $db;
    function __construct(){
        // $this->db = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
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
        $query = $this->db->prepare('SELECT * FROM comentarios  WHERE id_equipo=? ORDER BY id_comentario DESC ');
        $query->execute(array($id));
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function insertComment($username,$id_equipo,$comentario,$puntaje,$fecha){
        $query = $this->db->prepare('INSERT INTO comentarios(username,id_equipo,comentario,puntaje,fecha) VALUES(?,?,?,?,?)');
        $query->execute([$username,$id_equipo,$comentario,$puntaje,$fecha]);
    }

    public function deleteComment($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($id));
    }

}