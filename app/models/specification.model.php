<?php

class SpecificationModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM especificaciones");
        $query->execute();

        $specifications = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $specifications;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM especificaciones WHERE id_especificacion =?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function insert($tipo, $descripcion, $precio){
        $query = $this->db->prepare("INSERT INTO especificaciones (tipo, descripcion, precio) VALUES(?,?,?)");
        $query->execute([$tipo, $descripcion, $precio]);
        return $this->db->lastInsertId();
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM especificaciones WHERE id_especificacion=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function update($tipo, $descripcion, $precio, $id){
        $query = $this->db->prepare("UPDATE especificaciones SET tipo =?, descripcion =?, precio=? WHERE id_especificacion=?");
        $query->execute([$tipo, $descripcion, $precio, $id]);
        return $this->db->lastInsertId();
    }
   public function getAllOrder($order){
    if ($order == "asc"){
    $query = $this->db->prepare("SELECT * FROM especificaciones ORDER BY precio");
    $query->execute();

    $specifications = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $specifications;
    }
    if($order =="desc"){
    $query = $this->db->prepare("SELECT * FROM especificaciones ORDER BY precio DESC");
    $query->execute();

    $specifications = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $specifications;
    }
   }
   
   public function paginate($start, $limit){
    $query = $this->db->prepare("SELECT * FROM especificaciones LIMIT $limit OFFSET $start");
    $query->execute();
    $specifications = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $specifications;
   }
   public function getByFilter($filter, $value){
    $query= $this->db->prepare("SELECT * FROM especificaciones WHERE $filter LIKE '$value'");
    $query->execute();
    $specifications = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $specifications;
   }
}