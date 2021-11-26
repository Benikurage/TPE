<?php

class CommentsModel {
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');

    }

    public function getComments(){
        $query = $this->db->prepare("SELECT * FROM comentarios");
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    public function getComment($id){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // function filtrarComentariosPuntaje($id_contenido, $puntaje) {
    //     $query = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.comentario, comentarios.puntuacion, usuarios.nombreUsuario
    //     FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_contenido = ? AND comentarios.puntuacion = ?");
    //     $query->execute(array($id_contenido, $puntaje));
    //     $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
    //     return $comentarios;
    // }
    
    public function deleteComment($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $query->execute(array($id));
    }

    public function insertComment($comentario, $username, $id_producto, $puntaje){
        $query = $this->db->prepare("INSERT INTO `comentarios` (`comentario`, `username`, `id_producto`, `puntaje`) VALUES (?, ?, ?, ?)");
        $query->execute(array($comentario, $username, $id_producto, $puntaje));
        return $this->db->lastInsertId();
    }

}