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


if(isset($_POST["products"]))
{
    header("Location: ../Views/productCatalog.php");
}

?>