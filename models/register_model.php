<?php

class register_model{
    
    private $db;
    
    function __construct(){
        // 1. ABRIR LA CONEXION CON LA BASE DE DATOS (DB)
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_esports;charset=utf8','root','');
    }

    function get_users(){
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)        //Funcion que obtiene todos los usuarios
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        $users=$query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function insert_user($email, $password){                //Funcion que inserta un usuario nuevo (se le pasan dos parametros, email y password)
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('INSERT INTO user (email, password) VALUES (?,?)');
        $query -> execute(array($email, $password));
        
    }
    
    function delete_user($id_user){                                      //Funcion que elimina un usuario (se le pasa un parametro, id)
        // 2. EJECUTAR CONSULTA SQL (2 SUBPASOS: PREPARE Y EXECUTE)
        $query = $this->db->prepare('DELETE FROM user WHERE id = ?');
        $query -> execute(array($id_user));

    }

                                  // FALTA LA FUNCION PARA MODIFICAR UN USUARIO
    
}