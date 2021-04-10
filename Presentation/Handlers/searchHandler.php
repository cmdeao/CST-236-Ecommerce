<?php
require_once '../../BusinessService/ProductBusinessService.php';
include '../../BusinessService/functions.php';

$term = trim($_POST["search"]);

$business = new ProductBusinessService();
$orders = $business->searchByTerm($term);

if($orders)
{
    include '../Views/productCatalog.php';
    exit;
}
else
{
    echo "NOTHING WAS FOUND";
}
?>