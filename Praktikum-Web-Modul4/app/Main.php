<?php 
header("content-type: application/json; charset=UTF-8");

include "app/Routes/ProductRoutes.php";
use app\Routes\ProductRoutes;

//menangkap request method
$method = $_SERVER['REQUEST_METHOD'];
//menangkap request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//panggil routes
$productRoutes = new ProductRoutes();
$productRoutes->handle($method, $path);
?>