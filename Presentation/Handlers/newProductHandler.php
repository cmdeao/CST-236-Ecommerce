<?php
use BusinessService\Model\Product;

require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/Model/Product.php';
include '../../BusinessService/functions.php';

$name = trim($_POST['productName']);
$desc = trim($_POST['productDesc']);
$price = trim($_POST['price']);

$service = new ProductBusinessService();
$product = new Product(0, $name, $desc, $price);
if($service->newProduct($product))
{
    header("Location: ../Views/productCatalog.php");
}
else 
{
    echo "Couldn't add product";
}
?>