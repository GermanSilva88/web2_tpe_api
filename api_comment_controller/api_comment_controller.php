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
        return json_decode($this->data); //transforma texto crudo a JSON
    }

    public function get_coms()
    {   //evalua distintas maneras de obtener los comentarios
        if (isset($_REQUEST['sort']))
            $comments = $this->get_com_by_order($_REQUEST['sort']);
        else if (isset($_REQUEST['filter']))
            $comments = $this->get_com_by_filter($_REQUEST['filter']);
        else if (isset($_REQUEST['page']) && isset($_REQUEST['records']))
            $comments = $this->get_com_by_page($_REQUEST['page'], $_REQUEST['records']);
        else
            $comments = $this->obtener_coms();
        if ($comments != null) {  //una vez obtenidos los comentarios, los muestra
            return $this->view->response($comments, 200);
        } else {
            return $this->view->response("No se encontraron comentarios", 404);
        }
    }

    public function get_com($params = [])
    {   //lista un comentario por ID
        if ((isset($params) && ($params[":ID"] > 0))) {
            $comment_id = $params[":ID"];
            $comment = $this->model->get_comment($comment_id);
            if (!empty($comment)) {
                return $this->view->response($comment, 200);
            } else {
                return $this->view->response("Comentario con id=$comment_id No se encontro", 404);
            }
        }
    }

    public function obtener_coms()
    {   //llamada desde get_coms(), lista todos los comentarios
        $comments = $this->model->get_comments();
        return $this->view->response($comments, 200);
    }

    public function add_com()
    {   // getData devuelve el objeto JSON enviado por POST
        $body = $this->getData();
        // desglosa el comentario que viene en $body y lo guarda en las 3 variables
        $comment = $body->comment_game;
        $score = $body->score_game;
        $id_game = $body->game_id;
        $game = $this->model->add_comment($comment, $score, $id_game);
        $this->view->response("Comentario del juego " . $game->name_game . " creado con éxito", 201);
    }

    public function delete_com($params = [])
    {   //elimina comentarios por ID
        $comment_id = $params[':ID'];
        $comment = $this->model->get_comment($comment_id);
        if (!empty($comment)) {
            $this->model->delete_comment($comment_id);
            $this->view->response("Comentario con id=$comment_id eliminada con éxito", 200);
        } else
            $this->view->response("Comentario con id=$comment_id No se encontro", 404);
    }

    public function update_com($params = [])
    {   //modifica comentarios por ID
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
    {   //lista los comentarios segun un orden
        if ($this->verificar_atributos($sort)) {
            if (isset($_REQUEST['order']) && !empty($_REQUEST['order'])) {
                $order = $_REQUEST['order'];
            } else {
                $order = 'ASC';
            }
            return $this->model->obtener_comments_byOrder($sort, $order);
        } else
            return $this->view->response("Atributo no encontrado en la tabla", 404);
    }

    public function get_com_by_filter($filter)
    {   //lista los comentarios segun el filtro
        if ($this->verificar_atributos($filter)) {
            if (isset($_REQUEST['dato'])) {
                $dato = $_REQUEST['dato'];
                return $this->model->obtener_comments_byFilter($filter, $dato);
            } else
                return $this->view->response("Falta el valor de filtrado", 404);
        } else
            return $this->view->response("Atributo no encontrado en la tabla", 404);
    }

    public function get_com_by_page($page, $records)
    {   //lista los comentarios paginados
        if ((!empty($page)) && (!empty($records)) && ($page > 0) && ($records > 0) && (is_numeric($page)) && (is_numeric($records))) {
            $total_records = $this->model->total_records();
            if ($page <= $total_records / $records) {
                $from = ($records * ($page - 1));
                return $this->model->obtener_comments_byPage($from, $records);
            } else
                return $this->view->response("No hay demasiados elementos para listarlos de la manera pedida", 404);
        }
        return $this->view->response("Parametros incorrectos", 404);
    }

    public function verificar_atributos($atributo)
    {   //verifica que los valores de $sort y $filter sean validos, devuelve TRUE o FALSE
        $validSortOptions = ['name_game', 'comment_game', 'score_game'];
        return (in_array($atributo, $validSortOptions));
    }
}
