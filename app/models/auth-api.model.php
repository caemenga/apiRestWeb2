<?php
class AuthApiModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tiendabebidas;charset=utf8', 'root', '');
    }

    public function getUser($email) {
        $query = $this->db->prepare("SELECT * FROM administrador WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}