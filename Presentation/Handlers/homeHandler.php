<?php
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/Model/User.php';
include '../../BusinessService/functions.php';

if(isset($_POST["account"]))
{
    $user = getUser();
    include '../Views/accountPage.php';
    exit;
}

if(isset($_POST["logout"]))
{
    logOut();
    header("Location: ../Views/login.html");
}
$business = new ProductBusinessService();
$products = $business->getAllProducts();

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