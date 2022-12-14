<?php 

class ProductModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM productos");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $products;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM productos WHERE id_producto =?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM productos WHERE id_producto=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($producto, $marca, $idSpe){
        $query = $this->db->prepare("INSERT INTO productos (producto, marca, id_especificacion_fk) VALUES(?,?,?)");
        $query->execute([$producto, $marca, $idSpe]);
        return $this->db->lastInsertId();
    }
    public function update($producto, $marca, $id, $idSpe){
        $query = $this->db->prepare("UPDATE productos SET producto =?, marca =?, id_especificacion_fk=? WHERE id_producto=?");
        $query->execute([$producto, $marca,$idSpe, $id]);
        return $this->db->lastInsertId();
    }

    public function getAllOrder($order=null){
        if ($order == "asc"){
            $query = $this->db->prepare("SELECT * FROM productos ORDER BY marca");
            $query->execute();        
            $products = $query->fetchAll(PDO::FETCH_OBJ);   
            return $products;
            }
            if($order =="desc"){
            $query = $this->db->prepare("SELECT * FROM productos ORDER BY marca DESC");
            $query->execute(); 
            $products = $query->fetchAll(PDO::FETCH_OBJ);            
            return $products;
            }
    }
    public function paginate($start,$limit){
    $query = $this->db->prepare("SELECT * FROM productos LIMIT $limit OFFSET $start");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $products;
    }

    public function getByFilter($filter, $value){
        $query= $this->db->prepare("SELECT * FROM productos WHERE $filter LIKE '$value'");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $products;
    }

    public function getOrderByFilter($filter, $order){
        $query = $this->db->prepare("SELECT * FROM productos ORDER BY $filter $order");
        $query->execute(); 
        $products = $query->fetchAll(PDO::FETCH_OBJ);            
        return $products;
    }

}