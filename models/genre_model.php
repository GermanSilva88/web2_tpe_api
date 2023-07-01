<?php

class genre_model{
    
    private $db;
    
    public function __construct(){
        // 1. ABRIR LA CONEXION CON LA BASE DE DATOS (DB)
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_esports;charset=utf8','root','');
    }

    public function get_genre(){                                                  //Funcion que obtiene todos los generos
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('SELECT * FROM genre');
        $query->execute();
        $genres=$query->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }

    public function get_genre_modif($id){                                                  //Funcion que obtiene todos los generos
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('SELECT * FROM genre WHERE id_genre=?');
        $query->execute(array($id));
        $genre=$query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }

    public function insert_genre($name_genre, $description_genre){                //Funcion que inserta un genero nuevo (se le pasan dos parametros, name y description)
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('INSERT INTO genre (name_genre, description_genre) VALUES (?,?)');
        $query -> execute(array($name_genre, $description_genre));
        
    }
    
    public function delete_genre($id_genre){                                      //Funcion que elimina un genero (se le pasa un parametro, id)
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('DELETE FROM genre WHERE id_genre = ?');
        $query -> execute(array($id_genre));

    }


    public function update_genre_model($name_genre, $description_genre, $id){          //Funcion que modifica un genero ya cargado segun un ID. Se le pasan nombre y descripcion
         // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
         $query = $this->db->prepare('UPDATE genre SET name_genre = ?, description_genre = ? WHERE id_genre = ?');
         $query -> execute(array($name_genre, $description_genre, $id));

    }                              

}

