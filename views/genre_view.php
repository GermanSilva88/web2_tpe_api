<?php

require_once 'libs/Smarty.class.php';

class genre_view{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    public function show_genres($genres, $is_logged){
        // asigno variables al tpl smarty
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/genre_list.tpl');
    }
    
    public function show_genres_modif($genre, $is_logged){
        // asigno variables al tpl smarty
        $this->smarty->assign('genre', $genre);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/modificar_genre.tpl');
    } 
    
    public function mostrar_confirmacion($id, $is_logged){
        // asigno variables al tpl smarty
        $this->smarty->assign('id', $id);
        $this->smarty->assign('is_logged', $is_logged);
        $this->smarty->assign('BASE_URL', BASE_URL);
        // muestro el tpl
        $this->smarty->display('templates/confirmacion.tpl');
    }
}

