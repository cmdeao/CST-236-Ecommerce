<?php
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/Model/Product.php';
include '../../BusinessService/functions.php';

$value = trim($_POST['view']);
$business = new ProductBusinessService();
$product = $business->searchByID($value);

include '_displayProduct.php';

?>