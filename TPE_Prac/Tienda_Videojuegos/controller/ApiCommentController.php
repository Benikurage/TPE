<?php
require_once "model/CommentsModel.php";
require_once "ApiController.php";
require_once "view/ApiView.php";
require_once "model/UserModel.php";

class ApiComentController extends ApiController{

    public function getComents($operacion = []) {
        if (empty($operacion)) {
            $users = $this->comentariomodel->getComentarios();
            $this->view->response($users, 200); // 200 OK
        }
        else {
            $id = $operacion[":ID"];
            $user = $this->comentariomodel->traeruserComent($id);
            if ($user) {
                $this->view->response($user, 200);
            }
            else {
                $this->view->response("no existe el objeto de la posicion $id", 404);
            }
        }
    }

    public function getComentsCount () {
        $users = $this->comentariomodel->getCount();
            $this->view->response($users, 200); // 200 OK
    }

    public function getLimitedComents ($operacion = []) {
        if (empty($operacion)) {
            $users = $this->comentariomodel->getComentarios();
            $this->view->response($users, 200); // 200 OK
        }
        else {
            $id = $operacion[":ID"];
            $inicio = $operacion[":INIT"];
            $users = $this->comentariomodel->getLimitedComents($id, $inicio);
            $this->view->response($users, 200); // 200 OK
        }
    }


    public function addComent() {   
        $coments = $this->getBody(); // la obtengo del body
        // inserta la tarea
        $comentId = $this->comentariomodel->insertComent($coments->username,$coments->id_equipo,$coments->comentario,$coments->puntaje,$coments->fecha);
        // obtengo la recien creada
       
        $comentarioNuevo = $this->comentariomodel->getComentario($comentId);
        echo($comentarioNuevo);
        if (!$comentarioNuevo) {
            $this->view->response($comentarioNuevo, 200);
        }else{
            $this->view->response("no se pudo crear el comentario", 500);
           
            }
    }

    public function deleteComents ($operacion = null) {
        $id = $operacion[":ID"];
        $this->comentariomodel->deleteComent($id);
        $this->view->response("usuario $id borrado con exito", 200);
    }

    public function flitrarPorEstrellas($operacion = null) {
        $id = $operacion[":ID"];
        $estrellas = $operacion[":ESTRELLAS"];
        $comentarios = $this->comentariomodel->getByStars($id,$estrellas);
        $this->view->response($comentarios, 200);
    }

}

