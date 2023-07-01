<?php

require_once 'models/genre_model.php';
require_once 'views/genre_view.php';
require_once 'helpers/auth_helper.php';

class genre_controller
{

    private $model;
    private $view;
    private $helper;

    function __construct()
    {
        $this->model = new genre_model();
        $this->view = new genre_view();
        $this->helper = new auth_helper();
    }

    public function controller_genres()
    {              //CONTROLADOR - LISTA TODOS LOS GÉNEROS CARGADOS
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $genres = $this->model->get_genre();
        $this->view->show_genres($genres, $is_logged);
    }

    public function controller_update_genre($id)
    {
        $this->helper->checkLoggedIn();
        // session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $genre = $this->model->get_genre_modif($id);
        $this->view->show_genres_modif($genre, $is_logged);
    }

    public function update_genre($id)
    {
        $this->helper->checkLoggedIn();        //CONTROLADOR - MODIFICA/EDITA GÉNERO YA CARGADO
        if (isset($_POST['name_genre'], $_POST['description_genre'])) {
            $name_genre = $_POST['name_genre'];
            $description_genre = $_POST['description_genre'];
            $this->model->update_genre_model($name_genre, $description_genre, $id);
            header("Location: " . BASE_URL . "generos");                                        //UNA VEZ MODIFICADO EL REGISTRO, REDIRECCIONO A LA PAGINA DE GENEROS
        }
    }

    public function add_genre()
    {
        $this->helper->checkLoggedIn();         //Funcion para agregar un genero nuevo. Lee los valores que ingreso el usuario en el formulario
        if (isset($_POST['name_genre'], $_POST['description_genre'])) {
            $name_genre = $_REQUEST['name_genre'];
            $description_genre = $_REQUEST['description_genre'];
            $this->model->insert_genre($name_genre, $description_genre);
            header("Location: " . BASE_URL . "generos");                              //UNA VEZ QUE AGREGO EL GENERO NUEVO, REDIRECCIONO A LA PAGINA DE GENEROS
        }
    }

    public function delete_genre($id)
    {
        // $this->helper->checkLoggedIn();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        // Comprobar si se envió la confirmación desde el cliente
        if (isset($_POST['confirmacion']) && $_POST['confirmacion'] === 'confirmado') {
            // Realizar la eliminación del género
            $this->model->delete_genre($id);
            header("Location: " . BASE_URL . "generos");
        } else {
            // Mostrar la página de confirmación al usuario
            $this->view->mostrar_confirmacion($id, $is_logged);
        }
    }
}
