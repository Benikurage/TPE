<?php

abstract class ApiController {
    protected $view;
    protected $usermodel;
    protected $commentsModel;
    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->usermodel = new UserModel();
        $this->commentsModel = new CommentsModel();
        $this->data = file_get_contents("php://input"); 
    }

    function getBody(){ 
        return json_decode($this->data); 
    }  
}

