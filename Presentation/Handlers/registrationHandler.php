<?php

include '../../BusinessService/functions.php';
require_once '../../BusinessService/Model/User.php';
require_once '../../Database/DAO.php';

$firstName = trim($_POST["firstname"]);
$lastName = trim($_POST["lastname"]);
$email = trim($_POST["emailaddress"]);
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$confirmPass = trim($_POST["confirmpass"]);

if($password != $confirmPass)
{
    echo "Passwords do not match";
    exit;
}

$user = new User($firstName, $lastName, $email, $username);

if(registerUser($user, $password))
{
    header("Location: ../Views/homePage.html");
}
else
{
    echo "Failed to register user.";    
}

?>