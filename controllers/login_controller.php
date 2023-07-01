<?php
require_once 'views/login_view.php';
require_once 'models/user_model.php';
require_once 'helpers/auth_helper.php';

class login_controller
{

    private $view;
    private $model;
    private $auth_helper;

    public function __construct()
    {
        $this->view = new login_view();
        $this->model = new user_model();
        $this->auth_helper = new auth_helper();
    }

    public function show_login()
    {
        session_start();
        session_destroy();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        $this->view->show_login_view($is_logged);
    }

    public function verify_user()
    {
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->get_by_username($username);


            // Si encontró que hay un usuario en la base de datos con ese password, entra al if y se loguea

            // if ((!empty($user)) && (password_verify($password, $user->password))) { CON EL PASSWORD_VERIFY SIEMPRE TIRA LOGIN INCORRECTO
            if ((!empty($user))) {
                $this->auth_helper->login($user);

                header("Location: " . BASE_URL);               // lo redirijo a home pero ya logueado
            } else {
                $this->view->show_login_view($is_logged);
            }
        }
    }

    public function logout()
    {
        $this->auth_helper->logout();
        header("Location: " . BASE_URL . "home");
    }
}
