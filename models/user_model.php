<?php

class user_model{
    
    private $db;
    
    public function __construct(){
        // 1. ABRIR LA CONEXION CON LA BASE DE DATOS (DB)
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_esports;charset=utf8','root','');
    }

    public function get_by_username($username){         //traigo los datos de un usuario de la base de datos segun un $username, pasado como parametro
        $query=$this->db->prepare('SELECT * FROM user WHERE email=?');
        $query->execute(array($username));
        $user=$query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}