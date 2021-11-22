<?php
require_once './model/CommentsModel.php';
require_once './view/ApiView.php';
// require_once './controller/ApiController.php';

abstract class ApiCommentController{
    private $view;
    private $model;
    // protected $userModel;
    // private $data; 

    public function __construct() {
        $this->view = new ApiView();
        $this->model = new CommentsModel();
        // $this->userModel = new UserModel();
        // $this->data = file_get_contents("php://input"); 
    }

    //get comments
    function getComments(){
        $comments = $this->model->getComments();
        return $this->view->response($comments, 200);
    }

    function getBody(){ 
        return json_decode($this->data); 
    }  
}

