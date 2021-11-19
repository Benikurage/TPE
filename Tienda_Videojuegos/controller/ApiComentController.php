<?php
require_once "models/CommentModel.php";
require_once "ApiController.php";
require_once "view/ApiView.php";

class ApiComentController extends ApiController{

    public function getComments($operacion = []) {
        if (empty($operacion)) {
            $users = $this->commentsModel->getComments();
            $this->view->response($users, 200);
        }
        else {
            $id = $operacion[":ID"];
            $user = $this->commentsModel->getUserComment($id);
            if ($user) {
                $this->view->response($user, 200);
            }
            else {
                $this->view->response("no existe el objeto de la posicion $id", 404);
            }
        }
    }

    public function addComment() {   
        $comments = $this->getBody();
        // la obtengo del body
        //inserta la tarea
        $commentId = $this->commentsModel->insertComment($comments->username,$comments->id_equipo,$comments->commentario,$comments->puntaje,$comments->fecha);
        //obtengo la recien creada
        $newComment = $this->commentsModel->getComment($commentId);
        echo($newComment);
        if (!$newComment) {
            $this->view->response($newComment, 200);
        } else {
            $this->view->response("No se pudo crear el commentario", 500);
        }
    }

    public function deleteComments($operation = null) {
        $id = $operation[":ID"];
        $this->commentsModel->deleteComment($id);
        $this->view->response("Usuario $id borrado con exito", 200);
    }
}