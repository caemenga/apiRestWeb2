<?php
require_once './app/models/product.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';


class ProductController{
    private $model;
    private $view;
    private $data;
    private $helper;
    public function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
        $this->helper = new AuthApiHelper();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getProducts($params = null){

        //ordenar
        //endpoint: /api/products?orderby=precio
        if (isset($_GET['orderby'])){
            $products = $this->model->getAllOrder($_GET['orderby']);
            $this->view->response($products);
        }
        //paginacion
        //endpoint: /api/products?page=page&limit=limit
        elseif(isset($_GET['page'])&&(isset($_GET['limit']))){
            $page = $_GET['page'];
            $limit = $_GET['limit'];
            try{
                if((is_numeric($page))&&(is_numeric($limit))){
                    $start = ($page-1)*$limit;
                    $products = $this->model->paginate($start,$limit);
                    $this->view->response($products);
                }else
                $this->view->response("debe ingresar un numero", 400);

            }catch (PDOException $e){
                $this->view->response("ingrese numeros positivos para la paginacion", 400);
            }
        }
        else{
            $products = $this->model->getAll();
            $this->view->response($products);
        }
    }

    public function getProduct($params = null){
        $id = $params[':ID'];
        $product = $this->model->get($id);
        if($product){
            $this->view->response($product);
        }
        else{
            $this->view->response("el producto con id=$id no existe", 404);
        }
        
    }

    public function deleteProduct($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }else{
        $id = $params[':ID'];
        $product = $this->model->get($id);
        if($product){
            $this->model->delete($id);
            $this->view->response($product);
        }else
            $this->view->response("el producto con id=$id no existe", 404);
        }
    }   
    

    public function insertProduct(){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $product = $this->getData();

        if((empty($product->producto))||(empty($product->marca))){
            $this->view->response("complete todos los datos", 400);
        }else{
            $id = $this->model->insert($product->producto, $product->marca);
            $product = $this->model->get($id);
            $this->view->response($product, 201);
        }
    }
    public function updateProduct($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $product = $this->getData();
        $id = $params[':ID'];
        
        if((empty($product->producto))||(empty($product->marca))){
            $this->view->response("complete todos los datos", 400);
        }else
        $this->model->update($product->producto, $product->marca, $id);
        $product = $this->model->get($id);
        $this->view->response($product);
    }
}