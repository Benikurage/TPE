<?php
require_once './model/CommentsModel.php';
require_once './view/ApiView.php';

class ApiCommentController{
    private $view;
    private $model;
    private $data;

    public function __construct() {
        $this->view = new ApiView();
        $this->model = new CommentsModel();
        $this->data = file_get_contents("php://input");
    }

    function getComments($params = null){
        $id_producto = $params[':ID'];
        if (isset($params[':SCORE'])) {
            $score = $params[':SCORE'];
            $comments = $this->model->getCommentsByScore($id_producto, $score);
        } else {
            $comments = $this->model->getComments($id_producto);
        }
        if ($comments == true) {
            return $this->view->response($comments, 200);
        } else {
            return $this->view->response([], 204);    
        }
    }

    function getComment($params = []){
        $comment = $this->model->getComment($params[":ID"]);
        return $this->view->response($comment, 200);
    }
    
    function deleteComment($params = []){
        $comment_id = $params[':ID'];
        $comment = $this->model->getComment($comment_id);
        if ($comment) {
            $this->model->deleteComment($comment_id);
            $this->view->response("Comentario id=$comment_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$comment_id not found", 404);
    }

    function createComment() {
        $body = $this->getData();

        $comentario = $body->comentario;
        $nombre = $body->nombre;
        $id_producto = $body->id_producto;
        $puntaje = $body->puntaje;

        $comment = $this->model->insertComment($comentario, $nombre, $id_producto, $puntaje);
        if ($comment) {
            $this->view->response("Comentario id=$id_producto creado con éxito", 200);
        } else {
            $this->view->response("Comentario id=$id_producto not found", 404);
        }
    }
    
    function getData(){ 
        return json_decode($this->data); 
    }
      
}

