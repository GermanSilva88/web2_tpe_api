<?php

class auth_helper {
    public function __construct() {}

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;
        $_SESSION['IS_LOGGED'] = true;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn() {
        session_start();
        $is_logged = isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'];
        if (!($is_logged)) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USERNAME'];
    }
}
