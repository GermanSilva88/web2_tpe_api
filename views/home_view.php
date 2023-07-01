<?php

require_once 'libs/Smarty.class.php';

class home_view {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    
    public function mostrar_home($is_logged)
    {
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->display('templates/home.tpl');
    }
    
}
