<?php
class ListModel{
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getProduct($id){
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_genero=?");
        $sentencia->execute(array($id));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function getProducts(){
        //SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero) 
        $sentencia = $this->db->prepare("SELECT  * FROM producto ");
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    function getGenres(){
        $sentencia = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        $sentencia->execute();
        $generos = $sentencia->fetch(PDO::FETCH_OBJ);
        return $generos;
    }

    //function getGamesWithGenre(){
    //    // $sentencia = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
    //    //$sentencia = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
    //    $query = $this->db->prepare("SELECT producto.*, genero.nombre as genero FROM producto JOIN genero ON producto.id_genero = genero.id_genero");
    //    $query->execute();
    //    return $query->fetchAll(PDO::FETCH_OBJ);
    //}

    //function getGamesByGenre(){
    //    // $sentencia = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
    //    //$sentencia = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
    //    $query = $this->db->prepare("SELECT producto.*,genero.nombre from producto inner join genero on producto.id_genero = producto.id_genero where genero.id_genero = ?");
    //    $query->execute();
    //    return $query->fetchAll(PDO::FETCH_OBJ);
    //}

    function insert($nombre, $descripcion, $precio, $id_genero){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($nombre,$descripcion,$precio, $id_genero));
    }

    function insertgenero($id_genero,$nombre, $descripcion){
        $sentencia = $this->db->prepare("INSERT INTO genero(id_genero, nombre, descripcion,) VALUES(?, ?, ?)");
        $sentencia->execute(array($id_genero,$nombre,$descripcion,));
    }

    function deletedb($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_genero=?");
        $sentencia->execute(array($id));
    }
    
    function updatedb($id,$nombre,$descripcion,$precio){
        
        $sentencia = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_genero=?");
        $sentencia->execute(array($id));
    }
    
    function getGenre($id){
        $sentencia = $this->db->prepare( "SELECT * FROM genero WHERE id_genero=?");
        $sentencia->execute(array($id));
        $genero = $sentencia->fetch(PDO::FETCH_OBJ);
        return $genero;
    }

}