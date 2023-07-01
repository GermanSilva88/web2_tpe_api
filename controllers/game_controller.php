<?php

require_once 'models/game_model.php';
require_once 'views/game_view.php';
require_once 'models/genre_model.php';
require_once 'helpers/auth_helper.php';

class game_controller
{

    private $model;
    private $model_genre;
    private $view;
    private $helper;

    //Acá hay que iniciar los atributos y el contructor
    function __construct()
    {

        $this->model = new game_model();
        $this->model_genre = new genre_model();
        $this->view = new game_view();
        $this->helper = new auth_helper();
    }

    public function controller_games()
    {         //Funcion que muestra todos los juegos, le paso el arreglo con todos los juegos y el de todos los generos
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $games = $this->model->get_games();
        $list_genre = $this->model_genre->get_genre();
        $this->view->show_games($games, $list_genre, $is_logged);
    }

    public function controller_game($id)
    {         //Funcion que muestra detalle de un juego
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $game = $this->model->get_game($id);
        $this->view->show_game($game, $is_logged);
    }

    public function controller_game_bygenre($id)
    {         //Funcion que muestra detalle de todos los juegos segun el genero solicitado
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $game_id = $this->model->get_game_id($id);
        $this->view->show_game_id($game_id, $is_logged);
    }

    public function modificar_game($id)
    {
        $this->helper->checkLoggedIn();
        // session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $game = $this->model->consultar_generos($id); // Traemos nombre y descr del juego junto a genre.name_genre
        $list_genre = $this->model_genre->get_genre(); // Traemos todos los generos
        $this->view->modificar_game($game, $list_genre, $is_logged);
    }

    public function actualizar_game($id)
    {
        $this->helper->checkLoggedIn();
        if (isset($_POST['name_game'], $_POST['description_game'], $_POST['name_genre'])) {
            $name_game = $_REQUEST['name_game'];
            $description_game = $_REQUEST['description_game'];
            $id_genre = $_REQUEST['name_genre'];

            $this->model->update_game($id, $name_game, $description_game, $id_genre);
            header("Location: " . BASE_URL . "juegos");
        }
    }
    public function add_game()
    {
        $this->helper->checkLoggedIn();
        //Funcion para agregar un juego nuevo. Lee los valores que ingreso el usuario en el formulario
        if (isset($_POST['name_game'], $_POST['description_game'], $_POST['name_genre'])) {
            $name_game = $_POST['name_game'];
            $description_game = $_POST['description_game'];
            $genre_game = $_POST['name_genre'];
            $this->model->insert_game($name_game, $description_game, $genre_game);
            header("Location: " . BASE_URL . "juegos");     //UNA VEZ QUE AGREGO EL JUEGO NUEVO, REDIRECCIONO A LA PAGINA DE JUEGOS
        }
    }
    public function delete_game($id)
    {    //Funcion para eliminar un juego segun su id
        $this->helper->checkLoggedIn();
        $this->model->delete_game($id);
        header("Location: " . BASE_URL . "juegos");
    }
}
