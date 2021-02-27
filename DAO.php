<?php
require_once 'functions.php';

function registerUser($obj, $pw)
{
    $firstname = $obj->getFirstName();
    $lastname = $obj->getLastName();
    $username = $obj->getUsername();
    $password = $pw;
    $email = $obj->getEmail();
    
    $link = dbConnection();
    
    $query = mysqli_query($link, "SELECT * FROM users WHERE USERNAME = '$username'");
    
    if(!query)
    {
        die('ERROR: ' . mysqli_error($link));
    }
    
    if(mysqli_num_rows($query) > 0)
    {
        return false;
    }
    
    $emailQuery = mysqli_query($link, "SELECT * FROM users WHERE EMAIL_ADDRESS = '$email'");
    
    if(mysqli_num_rows($emailQuery) > 0)
    {
        return false;
    }
    
    $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, USERNAME, PASSWORD) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
    
    if(mysqli_query($link, $sql))
    {
        mysqli_close($link);
        return true;
    }
    
    mysqli_close($link);
    return FALSE;
}

?>