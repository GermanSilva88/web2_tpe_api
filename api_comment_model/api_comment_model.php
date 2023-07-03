<?php

class api_comment_model
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_esports;charset=utf8', 'root', '');
    }

    public function get_comments()
    {   //OBTIENE TODOS los comentarios
        $query = $this->db->prepare('SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM game 
        JOIN comment ON game.id_game=comment.game_id');
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    public function get_comment($comment_id)
    {   //OBTIENE un comentario segun ID
        $query = $this->db->prepare('SELECT game.name_game, comment.id, comment.comment_game, comment.score_game 
        FROM game 
        JOIN comment ON game.id_game=comment.game_id WHERE id=?');
        $query->execute(array($comment_id));
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    public function add_comment($comment, $score, $id_game)
    {   //AGREGA comentario nuevo
        $query = $this->db->prepare('INSERT INTO comment (comment_game, score_game, game_id) VALUES (?,?,?)');
        $query->execute(array($comment, $score, $id_game));
        $query = $this->db->prepare('SELECT * FROM game WHERE id_game=?');
        $query->execute(array($id_game));
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    public function delete_comment($comment_id)
    {   //ELIMINA comentario segun ID
        $query = $this->db->prepare('DELETE FROM comment WHERE id = ?');
        $query->execute(array($comment_id));
    }

    public function update_comment($comment_id, $comment, $score, $id_game)
    {   //MODIFICA comentario segun ID
        $query = $this->db->prepare('UPDATE comment SET comment_game = ?, score_game = ?, game_id = ? WHERE id = ?');
        $query->execute(array($comment, $score, $id_game, $comment_id));
    }

    public function obtener_comments_byOrder($sort, $order)
    {   //OBTIENE los comentarios ORDENADOS
        $query = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game ORDER BY $sort $order");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtener_comments_byFilter($filter, $dato)
    {   //OBTIENE los comentarios FILTRADOS
        $query = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game
        WHERE $filter = ?");
        $query->execute(array($dato));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtener_comments_byPage($from, $records)
    {   //OBTIENE los comentarios PAGINADOS
        $query = $this->db->prepare("SELECT game.name_game, comment.comment_game, comment.score_game 
        FROM comment
        JOIN game ON comment.game_id = game.id_game LIMIT $from, $records");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function total_records()
    {   //cuenta la cantidad total de comentarios que hay en la DDBB
        $query = $this->db->prepare("SELECT count(*) FROM comment");
        $query->execute();
        return $query->fetchColumn(); 
    }
}
