<?php

class api_comment_model
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_esports;charset=utf8', 'root', '');
    }

    public function get_comments()
    {

    }

    public function get_comment()
    {

    }

    public function save_comment()
    {

    }

    public function delete_comment()
    {

    }

    public function update_comment()
    {
        
    }

}