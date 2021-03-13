<?php

function dbConnection()
{
    $dbLink = mysqli_connect("lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "fvbykphsy321i69g", "gclt1ar8zbxnd5fj", "xyf4cqz9j7pkfezs");
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

function saveUserRole($role)
{
    session_start();
    $_SESSION["ROLE"] = $role;
}

function getUserRole()
{
    session_start();
    return $_SESSION["ROLE"];
}

function logUser($obj)
{
    session_start();
    $object = new User($obj->getFirstName(), $obj->getLastName(), $obj->getEmail(), $obj->getUsername(), $obj->getPassword(), $obj->getRole());
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

function saveTempID($temp)
{
    session_start();
    $_SESSION["TEMP_ID"] = $temp;
}

function getTempID()
{
    session_start();
    return $_SESSION["TEMP_ID"];
}
?>
