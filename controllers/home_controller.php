<?php

require_once 'views/home_view.php';

class home_controller
{

    private $view;

    function __construct()
    {
        $this->view = new home_view();
    }

    public function mostrar_inicio()
    {

        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];

        $this->view->mostrar_home($is_logged);
    }
}
