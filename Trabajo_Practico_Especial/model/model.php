<?php
class Model{

private $db;
function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
}

function getproducts(){
    $sentencia = $this->db->prepare( "SELECT  * FROM producto INNER JOIN genero ON (producto.id_genero = genero.id_genero); ");
    //select item.*,categoria.nombre from item inner join categoria on item.id_categoria = categoria.id_categoria
    $sentencia->execute();
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $productos;
} 

function insert($nombre, $descripcion, $precio, $id_genero){
    $sentencia = $this->db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
    $sentencia->execute(array($nombre,$descripcion,$precio, $id_genero ));
}

function deletedb($id){
    $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
    $sentencia->execute(array($id));
}

function updatedb($id,$nombre,$descripcion,$precio){

    $sentencia = $this->db->prepare("UPDATE producto SET `nombre`='$nombre',`descripcion`='$descripcion',`precio`='$precio' WHERE id_producto=?");
    $sentencia->execute(array($id));
}

function getproduct($id){
    $sentencia = $this->db->prepare( "SELECT * FROM producto WHERE id_producto=?");
    $sentencia->execute(array($id));
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    return $producto;
}



}