<?php 

class ProductModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tiendabebidas;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM db_productos");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $products;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM db_productos WHERE id_producto =?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM db_productos WHERE id_producto=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($producto, $marca){
        $query = $this->db->prepare("INSERT INTO db_productos (producto, marca) VALUES(?,?)");
        $query->execute([$producto, $marca]);
        return $this->db->lastInsertId();
    }
    public function update($producto, $marca, $id){
        $query = $this->db->prepare("UPDATE db_productos SET producto =?, marca =? WHERE id_producto=?");
        $query->execute([$producto, $marca, $id]);
        return $this->db->lastInsertId();
    }

    public function getAllOrder($order=null){
        if ($order == "ASC"){
            $query = $this->db->prepare("SELECT * FROM db_productos ORDER BY marca");
            $query->execute();        
            $products = $query->fetchAll(PDO::FETCH_OBJ);   
            return $products;
            }
            if($order =="DESC"){
            $query = $this->db->prepare("SELECT * FROM db_productos ORDER BY marca DESC");
            $query->execute(); 
            $products = $query->fetchAll(PDO::FETCH_OBJ);            
            return $products;
            }
    }
    public function paginate($start,$limit){
    $query = $this->db->prepare("SELECT * FROM db_productos LIMIT $limit OFFSET $start");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $products;
    }

}