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

    public function obtener_com()
    {
        if (isset($_REQUEST['sort']))
            $comments = $this->get_com_by_order($_REQUEST['sort']);
        else if (isset($_REQUEST['filter']))
            $comments = $this->get_com_by_filter($_REQUEST['filter']);
        // else if(isset($_REQUEST['pagina']) && isset($_REQUEST['filas']))
        //     $jugadores=$this->paginar($_REQUEST['pagina'],$_REQUEST['filas']);
        // else
        //     $comments = $this->model->get_comments();
        /*--En cualquiera de los casos muestra la vista adecuada--*/
        if ($comments != null)
            return $this->view->response($comments, 200);
        else
            return $this->view->response("No se encontraron comentarios", 404);
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

    public function get_com_by_order($sort)
    {
        if ($this->verificar_atributos($sort)) {
            if (isset($_REQUEST['order']) && !empty($_REQUEST['order'])) {
                $order = $_REQUEST['order'];
                // $sql = "SELECT * FROM comment ORDER BY $sort $order";
            } else {
                $order = 'ASC';
                // $sql = "SELECT * FROM comment ORDER BY $sort"; //lo llamaria ascendentemente por defecto   
            }
            return $this->model->obtener_comments_byOrder($sort, $order);
        } else
            return $this->view->response("Verificar la columna/atributo de la tabla elegida como criterio", 404);
    }


    // $comment_ord=$this->model->get_comment_by_order($sort, $order);
    // return $this->view->response($comment_ord, 200);
    //}
    public function get_com_by_filter($filter)
    {
        if ($this->verificar_atributos($filter)) {
            if (isset($_REQUEST['dato'])) {
                // $sql = "SELECT * FROM comment WHERE $filter = :dato";
                $dato = $_REQUEST['dato'];
                return $this->model->obtener_comments_byFilter($filter, $dato);
                // return $this->model->obtener_comments_byFilter($sql, $_REQUEST['dato']);
            }
        }
    }
    
    public function verificar_atributos($atributo)
    {
        $validSortOptions = ['name_game', 'comment_game', 'score_game'];
        //$validOrderOptions = ['ASC', 'DESC'];
        return (in_array($atributo, $validSortOptions));
    }
}
