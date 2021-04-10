<?php
require_once '../../BusinessService/Security.php';
require_once '../../BusinessService/Model/User.php';
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/ProductBusinessService.php';
include '../../BusinessService/functions.php';

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$logUser = new Security($username, $password);
$service = new ProductBusinessService();
if($logUser->authenticateUser() && $service->getCart())
{
    header("Location: ../Views/homePage.php");
}
else
{
    echo "Failed to log into the application.";
}

?>