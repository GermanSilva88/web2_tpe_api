<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once 'api_comment_model/api_comment_model.php';
require_once 'api_comment_view/api_comment_view.php';

class api_comment_controller
{

    private $model;
    private $view;
    private $data;


    public function __construct()
    {
        $this->model = new api_comment_model();
        $this->view = new api_comment_view();
        $this->data = file_get_contents("php://input");
    }

    public function getData()
    {
        return json_decode($this->data);
    }

    public function get_com($params = [])
    {
        if (empty($params)) {
            //get comments from model
            $comments = $this->model->get_comments();
            return $this->view->response($comments, 200);
        } else {
            $comment_id = $params[":ID"];
            $comment = $this->model->get_comment($comment_id);
            if (!empty($comment)) {
                return $this->view->response($comment, 200);
            } else {
                return $this->view->response($comment, 404);
            }
        }
    }

    public function add_com($params = [])
    {

        // devuelve el objeto JSON enviado por POST
        $body = $this->getData();
        // inserta el comentario
        $comment = $body->comment_game;
        $score = $body->score_game;
        $id_game = $body->game_id;

        $game = $this->model->add_comment($comment, $score, $id_game);
        $this->view->response("Comentario del juego " . $game->name_game . " creado con éxito", 201);
    }

    public function delete_com($params = [])
    {
        //delete comments from model by ID
        $comment_id = $params[':ID'];
        $comment = $this->model->get_comment($comment_id);
        if (!empty($comment)) {
            $this->model->delete_comment($comment_id);
            $this->view->response("Comment id=$comment_id eliminada con éxito", 200);
        } else
            $this->view->response("Comment id=$comment_id No se encontro", 404);
    }

    public function update_com($params = [])
    {
        $comment_id = $params[':ID'];
        $comment = $this->model->get_comment($comment_id);
        if (!empty($comment)) {
            $body = $this->getData();
            $comment = $body->comment_game;
            $score = $body->score_game;
            $id_game = $body->game_id;
            $comment = $this->model->update_comment($comment_id, $comment, $score, $id_game);
            $this->view->response("Comment id=$comment_id actualizada con éxito", 200);
        } else
            $this->view->response("Comment id=$comment_id No se encontro", 404);
    }

    public function get_com_by_order($params = null)
    {
        $sort = $_REQUEST['sort'];
        $order = $_REQUEST['order'];
        $validSortOptions = ['name_game', 'comment_game', 'score_game'];
        $validOrderOptions = ['ASC', 'DESC'];
        if (!in_array($sort, $validSortOptions) || !in_array($order, $validOrderOptions)) {
            // Manejar el error o establecer valores predeterminados
            $sort = 'score_game';
            $order = 'ASC';
        }
        $comment_ord=$this->model->get_comment_by_order($sort, $order);
        return $this->view->response($comment_ord, 200);
    }
}
