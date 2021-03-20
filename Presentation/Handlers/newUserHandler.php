<?php

require_once '../../BusinessService/UserBusinessService.php';
require_once '../../BusinessService/Model/User.php';
include '../../BusinessService/functions.php';

$fName = trim($_POST['firstname']);
$lName = trim($_POST['lastname']);
$email = trim($_POST['emailaddress']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = trim($_POST['role']);

$service = new UserBusinessService();
$user = new User($fName, $lName, $email, $username, $password, $role);
if($service->newUser($user))
{
    header("Location: ../Views/userAdmin.php");
}
else
{
    echo "Could not add user";
}
?>