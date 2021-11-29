<?php
class GenreModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getGenre($id){
        $query = $this->db->prepare("SELECT * FROM genero WHERE id_genero=?");
        $query->execute(array($id));
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }
    
    function getGenres(){
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();
        $genres = $query->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }

    function getGamesByGenre($id){
        $query = $this->db->prepare( "SELECT * FROM producto WHERE id_genero=?");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // function insertGenre($posicion, $genre){
    //     $query = $this->db->prepare("INSERT INTO `genero` (`id_genero`, `genre`) VALUES (?, ?);");
    //     $query->execute(array($posicion, $genre));
    //     return $this->db->lastInsertId();

    // }
    function insertGenre($genre){
        $query = $this->db->prepare("INSERT INTO `genero` (`genre`) VALUES (?);");
        $query->execute(array($genre));
        return $this->db->lastInsertId();
    }

    function deleteGenre($id){
        try {
            $query = $this->db->prepare("DELETE FROM genero WHERE id_genero=?");
            $query->execute(array($id));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function updateGenre($id, $genre){
        $query = $this->db->prepare("UPDATE `genero` SET `genre` = '$genre' WHERE `genero`.`id_genero` = ?");
        $query->execute(array($id));
    }
   
}