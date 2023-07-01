<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once 'api_comment_model/api_comment_model.php';
require_once 'api_comment_view/api_comment_view.php';

class api_comment_controller {

    private $model;
    private $view;
    private $data;

    public function __construct (){
        $this->model = new api_comment_model();
        $this->view = new api_comment_view();
        $this->data = file_get_contents("php://input");
    }

    public function get_comments(){
        //get comments from model
    }

    public function add_comment(){
        //get comments from model
    }

    public function get_comment($id){
        //get comment from model by ID
    }

    public function delete_comment($id){
        //delete comments from model by ID
    }
}