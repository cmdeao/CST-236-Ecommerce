<?php
require_once 'Security.php';
require_once 'User.php';
include 'functions.php';

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$logUser = new Security($username, $password);

if($logUser->authenticateUser())
{
    echo "Successfully logged into the application.";
}
else
{
    echo "Failed to log into the application.";
}

?>