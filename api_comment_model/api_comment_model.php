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
        $query = $this->db->prepare('SELECT game.name_game, comment.comment_game, comment.score_game FROM game join comment on game.id_game=comment.game_id WHERE id=?');
        $query->execute(array($comment_id));
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    public function add_comment($comment, $score, $id_game)
    {
        $query = $this->db->prepare('INSERT INTO comment (comment_game, score_game, game_id) VALUES (?,?,?)');
        $query->execute(array($comment, $score, $id_game));
        $query = $this->db->prepare('SELECT * FROM game WHERE id_game=?');
        $query->execute(array($id_game));
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    public function delete_comment($comment_id)
    {
        $query = $this->db->prepare('DELETE FROM comment WHERE id = ?');
        $query->execute(array($comment_id));
    }

    public function update_comment($comment_id, $comment, $score, $id_game)
    {
        $query = $this->db->prepare('UPDATE comment SET comment_game = ?, score_game = ?, game_id = ? WHERE id = ?');
        $query->execute(array($comment, $score, $id_game, $comment_id));
    }

    // public function get_comment_by_order($sort, $order)
    // {
    //     $query = $this->db->prepare('SELECT game.name_game, comment.comment_game, comment.score_game 
    //     FROM game 
    //     JOIN comment ON game.id_game = comment.game_id 
    //     ORDER BY ' . $sort . ' ' . $order);
    //     //  $query->bindParam(':sort', $sort);
    //     //  $query->bindParam(':order', $order);
    //      $query->execute();
    //     $comments = $query->fetchAll(PDO::FETCH_OBJ);
    //     return $comments;
    // }

    public function obtener_comments_byOrder($sort, $order)
    {   //obtiene los comentarios ordenados
        $sentencia = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game ORDER BY $sort $order");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    // public function obtener_comments_byFilter($sql, $dato)
    // {
    //     $sentencia = $this->db->prepare($sql);
    //     $sentencia->execute([':dato' => $dato]);
    //     return $sentencia->fetchAll(PDO::FETCH_OBJ);
    // }

    public function obtener_comments_byFilter($filter, $dato)
    {   //obtiene los comentarios filtrados
        $sentencia = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game
        WHERE $filter = ?");
        $sentencia->execute(array($dato));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtener_comments_byPage($from, $records)
    {   //obtiene los comentarios paginados
        $sentencia = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game LIMIT $from, $records");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function total_records()
    {   //cuenta la cantidad total de comentarios que hay en la DDBB
        $sentencia = $this->db->prepare("SELECT count(*) FROM comment");
        $sentencia->execute();
        return $sentencia->fetchColumn(); 
    }
}
