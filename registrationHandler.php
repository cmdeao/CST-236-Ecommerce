<?php
include 'functions.php';
include 'DAO.php';
require_once 'User.php';

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
    echo "Registered user!";
}
else
{
    echo "Failed to register user.";    
}

?>