<?php

class CommentsModel {
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');

    }

    public function getComments($id){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_producto = ?");
        $query->execute(array($id));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    public function getCommentsByScore($id_producto, $puntaje){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_producto = ? AND puntaje = ?");
        $query->execute(array($id_producto, $puntaje));
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    // function getSortedComments($id_producto, $filter, $order) {
    //     //0) get filter & get by id
    //     //1) get inner, ORDER BY $filtro $orden
    //     //2) return
    //     // FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_contenido = ? ORDER BY $filtro $orden");
    //     $query = $this->db->prepare("SELECT * FROM comentarios WHERE commentarios.id_producto = ?  ORDER BY $filter $order");
    //     $query->execute(array($id_producto));
    //     $comments = $query->fetchAll(PDO::FETCH_OBJ);
    //     return $comments;
    // }

    public function getComment($id){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCommentsByName($name){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE nombre = ? ");
        $query->execute(array($name));
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

    public function insertComment($comentario, $nombre, $id_producto, $puntaje){
        $query = $this->db->prepare("INSERT INTO `comentarios` (`comentario`, `nombre`, `id_producto`, `puntaje`) VALUES (?, ?, ?, ?)");
        $query->execute(array($comentario, $nombre, $id_producto, $puntaje));
        return $this->db->lastInsertId();
    }

}