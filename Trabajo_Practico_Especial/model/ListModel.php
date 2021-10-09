<?php
class ListModel{

private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }

    function getProducts(){
        $sentencia = $this->db->prepare("SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        //SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero) 
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    } 

    function insert($nombre, $descripcion, $precio, $id_genero){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($nombre,$descripcion,$precio, $id_genero));
    }

    //function insertgenero($id_genero,$nombre, $descripcion){
    //    $sentencia = $this->db->prepare("INSERT INTO genero(id_genero, nombre, descripcion,) VALUES(?, ?, ?)");
    //    $sentencia->execute(array($id_genero,$nombre,$descripcion,));
    //}

    function deletedb($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id));
    }
    
    function updatedb($id,$nombre,$descripcion,$precio){
        
        $sentencia = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_producto=?");
        $sentencia->execute(array($id));
    }
    
    function getProduct($id){
        $sentencia = $this->db->prepare( "SELECT * FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;
    }
}