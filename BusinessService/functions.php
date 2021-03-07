<?php

function dbConnection()
{
    $dbLink = mysqli_connect("localhost", "root", "root", "cst-236-ecommerce");
    if($dbLink === false)
    {
        die("ERROR: Connection failed: " . mysqli_connect_error());
    }
    return $dbLink;
}

function saveUserID($userID)
{
    session_start();
    $_SESSION["USER_ID"] = $userID;
}

function getUserID()
{
    session_start();
    return $_SESSION["USER_ID"];
}

function logUser($obj)
{
    session_start();
    $object = new User($obj->getFirstName(), $obj->getLastName(), $obj->getEmail(), $obj->getUsername());
    $_SESSION['USER'] = serialize($object);
}

function getUser()
{
    session_start();
    $object = unserialize($_SESSION['USER']);
    return $object;
}

function logOut()
{
    session_start();
    session_unset();
}
?>