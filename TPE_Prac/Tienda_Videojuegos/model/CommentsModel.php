<?php

class CommentsModel {
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8','root','');
    }

    // trae todos los comentarios
    public function getComentarios(){
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    // trae un comentario por id
    public function getComentario($id){
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    public function getCount() {
        $sentencia = $this->basededatos->prepare("SELECT COUNT(*) FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchColumn();
    }
    public function getLimitedComents($id, $inicio) {
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios WHERE id_equipo=? AND id_comentario>=? LIMIT 5;");
        $sentencia->execute(array($id, $inicio));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    // trae los comentarios de un equipo ordenado descendente
    public function traeruserComent($id){
        $sentencia = $this->basededatos->prepare('SELECT * FROM comentarios  WHERE id_equipo=? ORDER BY id_comentario DESC ');
        $sentencia->execute(array($id));
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }
    // inserta un comentario
    public function insertComent($username,$id_equipo,$comentario,$puntaje,$fecha){
        $sentencia = $this->basededatos->prepare('INSERT INTO comentarios(username,id_equipo,comentario,puntaje,fecha) VALUES(?,?,?,?,?)');
        $sentencia->execute([$username,$id_equipo,$comentario,$puntaje,$fecha]);
    }
    // borrar un comentario
    public function deleteComent($id){
        $sentencia = $this->basededatos->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $sentencia->execute(array($id));
    }

    public function getByStars($id,$stars){
        $sentencia = $this->basededatos->prepare('SELECT * FROM comentarios WHERE id_equipo=? AND puntaje=?');
        $sentencia->execute(array($id,$stars));
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
       
    }

}