#Leer tabla
<!-- function getPagos(){
    $db = new PDO('mysql:host=localhost;'
    .'dbname=db_deudas;charset=utf8'
    , 'root', '');
    $query = $db->prepare('SELECT*FROM pagos');
    $query->execute();
    $pagos = $query->fetchAll(PDO::FETCH_OBJ);
    var_dump($pagos);
    return $pagos;
} -->

<?php 
require_once "./Model/model.php";
require_once "./View/view.php";

class Controller{

    private $model;
    private $view;

    function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }

    function Home(){
        $tasks = $this->model->getTasks();
        $this->view->showTasks($tasks);
    }

    function create(){
        if(!isset($_POST['done'])){
            $done = 0;
        }else{
            $done = 1;
        }

        $this->model->insert($_POST['title'], $_POST['description'], $_POST['priority'], $done);
        $this->view->showHomeLocation();
    }

    function delete($id){
        $this->model->deletedb($id);
        $this->view->showHomeLocation();
    }

    function update($id){
        $this->model->updatedb($id);
        $this->view->showHomeLocation();
    }
    
    function view($id){
        $task = $this->model->getTask($id);
        $this->view->showTask($task);
    }
}