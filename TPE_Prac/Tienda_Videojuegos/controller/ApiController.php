<?php

abstract class ApiController {
    protected $view;
    protected $userModel;
    protected $commentsModel;
    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->userModel = new UserModel();
        $this->commentsModel = new CommentsModel();
        $this->data = file_get_contents("php://input"); 
    }

    function getBody(){ 
        return json_decode($this->data); 
    }  
}

