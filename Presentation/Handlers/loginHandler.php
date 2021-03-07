<?php

require_once '../../BusinessService/Security.php';
require_once '../../BusinessService/Model/User.php';
include '../../BusinessService/functions.php';

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$logUser = new Security($username, $password);
if($logUser->authenticateUser())
{
    header("Location: ../Views/homePage.html");
}
else
{
    echo "Failed to log into the application.";
}

?>