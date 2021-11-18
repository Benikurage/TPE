<?php
class ProductModel{
    
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
    }
    
    function getProduct($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto=?");
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }
    
    function getProductsByGenre($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_genero=?");
        $query->execute(array($id));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProducts(){
        $query = $this->db->prepare("SELECT  * FROM producto");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
       
    function getGenresFromProducts(){
        $query = $this->db->prepare("SELECT * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero)");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function insert($nombre, $descripcion, $precio, $id_genero){
        $query = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
        $query->execute(array($nombre,$descripcion,$precio, $id_genero));
    }
   
    function deletedb($id){
        $query = $this->db->prepare("DELETE FROM `producto` WHERE `producto`.`id_producto` = ?");
        $query->execute(array($id));
    }
        
    function updatedb($id,$nombre,$descripcion,$precio){
        $query = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_producto=?");
        $query->execute(array($id));
    }
 
}