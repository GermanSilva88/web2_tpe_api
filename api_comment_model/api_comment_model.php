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
        $query = $this->db->prepare('SELECT game.name_game, comment.comment_game, comment.score_game FROM game join comment on game.id_game=comment.game_id');
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;

    }

    public function get_comment($comment_id)
    {

    }

    public function add_comment($comment, $score, $game_id)
    {

    }

    public function delete_comment($comment_id)
    {

    }

    public function update_comment($comment_id)
    {

    }

}