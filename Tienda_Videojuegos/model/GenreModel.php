<?php
class GenreModel{
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getGenre($id){
        $query = $this->db->prepare("SELECT * FROM genero WHERE id_genero=?");
        $query->execute(array($id));
        $genero = $query->fetch(PDO::FETCH_OBJ);
        return $genero;
    }
    
    function getGenres(){
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }

    function getGamesByGenre($id){
        $query = $this->db->prepare( "SELECT * FROM producto WHERE id_genero=?");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertgenero($posicion, $genre){
        $query = $this->db->prepare("INSERT INTO `genero` (`id_genero`, `genre`) VALUES (?, ?);");
        $query->execute(array($posicion, $genre));
    }

    function deletegr($id){
        try {
            $query = $this->db->prepare("DELETE FROM genero WHERE id_genero=?");
            $query->execute(array($id));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function updategr($id, $genre){
        $query = $this->db->prepare("UPDATE `genero` SET `genre` = '$genre' WHERE `genero`.`id_genero` = ?");
        $query->execute(array($id));
    }
   
}