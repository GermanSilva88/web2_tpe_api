<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once 'api_comment_model/api_comment_model.php';
require_once 'api_comment_view/api_comment_view.php';

abstract class api_comment_controller
{

    protected $model;
    protected $view;
    protected $data;

    public function __construct()
    {
        $this->model = new api_comment_model();
        $this->view = new api_comment_view();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }

    function get($params = [])
    {
        if (empty($params)) {
            //get comments from model
            $comments = $this->model->get_comments();
            return $this->view->response($comments, 200);
        } else {
            $comment = $this->model->get_comment($params[":ID"]);
            if (!empty($comment)) {
                return $this->view->response($comment, 200);
            } else {
                return $this->view->response($comment, 404);
            }
        }
    }

    public function add_comment($params = [])
    {
        // devuelve el objeto JSON enviado por POST
        $body = $this->getData();
        // inserta el comentario
        $comment = $body->comment_game;
        $score = $body->score_game;
        $new_comment = $this->model->save_comment($comment, $score);
    }

    public function get_comment($id)
    {
        //get comment from model by ID
    }

    public function delete_comment($params = [])
    {
        //delete comments from model by ID
        $comment_id = $params[':ID'];
        $comment = $this->model->get_comment($comment_id);
        if (!empty($comment)) {
            $this->model->delete_comment($comment_id);
            $this->view->response("Comment id=$comment_id eliminada con éxito", 200);
        } else
            $this->view->response("Comment id=$comment_id not found", 404);
    }
}
