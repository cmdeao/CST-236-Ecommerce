<?php
require_once '../../BusinessService/ProductBusinessService.php';
include '../../BusinessService/functions.php';

$term = trim($_POST["search"]);

$business = new ProductBusinessService();
$products = $business->searchByTerm($term);

if($products)
{
    include '../Views/productCatalog.php';
    exit;
}
else
{
    echo "NOTHING WAS FOUND";
}
?>