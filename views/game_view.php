<?php
require_once 'libs/Smarty.class.php';

class game_view {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    public function show_games($games, $list_genre, $is_logged) {
        // asigno variables al tpl smarty
        $this->smarty->assign('games', $games);
        $this->smarty->assign('list_genre', $list_genre);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/game_list.tpl');
    }

    public function show_game($game, $is_logged) {
        // asigno variables al tpl smarty
        $this->smarty->assign('game', $game);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/game_details.tpl');
    }
    
    public function show_game_id($game_id, $is_logged) {
        // asigno variables al tpl smarty
        $this->smarty->assign('game', $game_id);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/game_details_id.tpl');
    }

    public function modificar_game($game, $list_genre, $is_logged){
        // asigno variables al tpl smarty
        $this->smarty->assign('game', $game);
        $this->smarty->assign('list_genre', $list_genre);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/modificar_game.tpl');
    }
    
}

