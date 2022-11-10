<?php	
require_once './libs/router.php';
require_once './app/controllers/producto-api.controller.php';
require_once './app/controllers/especificacion-api.controller.php';


$router = new Router();
//producto
$router->addRoute('products', 'GET', 'ProductController', 'getProducts');
$router->addRoute('products/:ID', 'GET', 'ProductController', 'getProduct');
$router->addRoute('products', 'POST', 'ProductController', 'insertProduct');
$router->addRoute('products/:ID', 'DELETE', 'ProductController', 'deleteProduct');
$router->addRoute('products/:ID', 'PUT', 'ProductController', 'updateProduct');
//categoria
$router->addRoute('specifications', 'GET', 'SpecificationController', 'getSpecifications');
$router->addRoute('specifications/:ID', 'GET', 'SpecificationController', 'getSpecification');
$router->addRoute('specifications', 'POST', 'SpecificationController', 'insertSpecification');
$router->addRoute('specifications/:ID', 'DELETE', 'SpecificationController', 'deleteSpecification');
$router->addRoute('specifications/:ID', 'PUT', 'SpecificationController', 'updateSpecification');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);