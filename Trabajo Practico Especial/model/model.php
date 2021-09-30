<?php
class Model{

private $db;
function __construct(){
     $this->db = new PDO('mysql:host=localhost;'.'dbname=tienda_videojuegos;charset=utf8', 'root', '');
}

function getTasks(){
    $sentencia = $this->db->prepare( "select * from tareas");
    $sentencia->execute();
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $productos;
} 

function insert($nombre, $descripcion, $precio, $id_genero){
    $sentencia = $this->db->prepare("INSERT INTO tareas(nombre, descripcion, precio, id_genero) VALUES(?, ?, ?, ?)");
    $sentencia->execute(array($nombre,$descripcion,$precio, $id_genero ));
}

function deletedb($id){
    $sentencia = $this->db->prepare("DELETE FROM tareas WHERE id_producto=?");
    $sentencia->execute(array($id));
}

function updatedb($id){
    $sentencia = $this->db->prepare("UPDATE tareas SET finalizada=1 WHERE id_producto=?");
    $sentencia->execute(array($id));
}

function getTask($id){
    $sentencia = $this->db->prepare( "select * from tareas WHERE id_producto=?");
    $sentencia->execute(array($id));
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    return $producto;
}
}