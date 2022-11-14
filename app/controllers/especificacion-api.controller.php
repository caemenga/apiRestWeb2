<?php
require_once './app/models/specification.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';
class SpecificationController{
    private $model;
    private $view;
    private $data;
    private $helper;

    public function __construct(){
        $this->model = new SpecificationModel();
        $this->view = new ApiView();
        $this->helper = new AuthApiHelper();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getSpecifications($params = null){
        //ordenar
        //endpoint: /api/specifications?orderby=precio
        if (isset($_GET['orderby'])){
            $specifications = $this->model->getAllOrder($_GET['orderby']);
            $this->view->response($specifications);
        }
        //paginacion
        //endpoint: /api/specifications?page=page?limit=limit
        elseif(isset($_GET['page'])&&(isset($_GET['limit']))){
            $page =$_GET['page'];
            $limit =$_GET['limit'];
            try{
                if((is_numeric($page))&&(is_numeric($limit))){
                    $start = ($page-1) * $limit;

                    $specifications = $this->model->paginate($start,$limit);
                    $this->view->response($specifications);    
                }else
                    $this->view->response("debe ingresar un numero", 400);    
                                
            }
            catch (PDOException $e){
                $this->view->response("ingrese numeros positivos para la paginacion", 400);
            }
        }
       // /api/specifications?filter=columna&value=valor
       if((isset($_GET['filter']))&&(isset($_GET['value']))){
        $filter = $_GET['filter'];
        $value = $_GET['value'];
        $specifications = $this->model->getByFilter($filter, $value);
        $this->view->response($specifications);
       }
        else{
        $specifications = $this->model->getAll();
        $this->view->response($specifications);
        }
    }

    public function getSpecification($params = null){
        $id = $params[':ID'];
        $specification = $this->model->get($id);
        if($specification){
            $this->view->response($specification);
        }
        else{
            $this->view->response("la especificacion con id=$id no existe", 404);
        }
        
    }

    public function insertSpecification($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $specification = $this->getData();
    
            if((empty($specification->tipo))||(empty($specification->descripcion))||(empty($specification->precio))||(empty($specification->stock))){
                $this->view->response("complete todos los datos", 400);
            }else
                $id = $this->model->insert($specification->tipo, $specification->descripcion, $specification->precio, $specification->stock);
                $specification = $this->model->get($id);
                $this->view->response($specification, 201);
        

    }

    public function deleteSpecification($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $id = $params[':ID'];
        $specification = $this->model->get($id);
        if($specification){
            $this->model->delete($id);
            $this->view->response($specification);
        }else
            $this->view->response("el specification con id=$id no existe", 404);
    }

    public function updateSpecification($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $specification = $this->getData();
        $id = $params[':ID'];
        
        if((empty($specification->tipo))||(empty($specification->descripcion))||(empty($specification->precio))||(empty($specification->stock))){
            $this->view->response("complete todos los datos", 400);
        }else
        $this->model->update($specification->tipo, $specification->descripcion, $specification->precio, $specification->stock, $id);
        $specification = $this->model->get($id);
        $this->view->response( $specification);
    }
}