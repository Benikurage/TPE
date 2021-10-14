<?php
class ListModel{
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getProduct($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto=?");
        $query->execute(array($id));
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function getProducts(){
        //SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero) 
        //$query = $this->db->prepare("SELECT * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero) WHERE genero.id_genero = 3);
        //$query = $this->db->prepare("SELECT * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        $query = $this->db->prepare("SELECT  * FROM producto");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
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

    function getInner(){
        $query = $this->db->prepare("SELECT * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        $query->execute();
        $inner = $query->fetchAll(PDO::FETCH_OBJ);
        return $inner;
    }

    function getGamesByGenre($id){
        $query = $this->db->prepare( "SELECT * FROM producto WHERE id_genero=?");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insert($nombre, $descripcion, $precio, $id_genero){
        $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
        $query->execute(array($nombre,$descripcion,$precio, $id_genero));
    }
    
    // function insert($nombre, $descripcion, $precio){
    //     $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio) VALUES(?, ?, ?)");
    //     $query->execute(array($nombre,$descripcion,$precio));
    // }
   
    function deletedb($id){
            $query = $this->db->prepare("DELETE FROM `producto` WHERE `producto`.`id_producto` = ?");
            $query->execute(array($id));
    }
        
    function updatedb($id,$nombre,$descripcion,$precio){
        $query = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_producto=?");
        $query->execute(array($id));
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
            //throw $th;
        }
    }

    function updategr($id, $genre){
        $query = $this->db->prepare("UPDATE `genero` SET `genre` = '$genre' WHERE `genero`.`id_genero` = ?");
        $query->execute(array($id));
    }
     
    // function getGamesByGenre($id){
    //     // $query = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
    //     //$query = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
    //     $query = $this->db->prepare("SELECT producto.*,genero.nombre from producto inner join genero on producto.id_genero = producto.id_genero where genero.id_genero = ?");
    //     $query->execute();
    //     return $query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    //SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero) WHERE genero.id_genero = ?;

    // function getGamesWithGenre(){
    //     // $query = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
    //     //$query = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
    //     $query = $this->db->prepare("SELECT producto.*, genero.nombre as genero FROM producto JOIN genero ON producto.id_genero = genero.id_genero");
    //     $query->execute();
    //     return $query->fetchAll(PDO::FETCH_OBJ);
    // }
    
    // function getGenre($id){
    //     $query = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
    //     $query->execute(array($id));
    //     $producto = $query->fetch(PDO::FETCH_OBJ);
    //     return $producto;
    // }
    
}