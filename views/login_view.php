<?php

require_once 'libs/Smarty.class.php';

class login_view {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function show_login_view($is_logged) {  //Al llamar a la funcion, se le puede pasar O NO el parametro
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->display('templates/login.tpl');
    }

}

