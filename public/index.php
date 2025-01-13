<?php 

include './../app/Core/Route.php';
include './../routes/web.php';
include './../app/DAOs/Dao.php';
include './../app/DAOs/Product.php';

// $route = $_SERVER["REQUEST_URI"];


// echo $route;


$product = new Product();

// $dao->find(["id" => 1, "name" => "yes"]); // yes

$product->find(
    ["id" => 1 ,
    "Title" => "Admin",
    "Quantity" => 24.00 ]
);