<?php
namespace BusinessService;
use User;

class UserDataService
{
    function getAllUsers()
    {
        $database = dbConnection();
        $sql = "SELECT USER_ID, FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, BANNED, DELETED, USERNAME, ROLE FROM users";
        $result = mysqli_query($database, $sql);
        
        $index = 0;
        $users = array();
        
        while($row = $result->fetch_assoc())
        {
            $users[$index] = array($row["USER_ID"], $row["FIRST_NAME"], $row["LAST_NAME"], $row["EMAIL_ADDRESS"], $row["BANNED"],
                $row["DELETED"], $row["USERNAME"], $row["ROLE"]);
            ++$index;
        }
        
        $result->free();
        mysqli_close($database);
        return $users;
    }
    
    function makeNew($person)
    {
        $database = dbConnection();
        
        $checkUsername = $person->getUsername();
        $checkEmail = $person->getEmail();
        
        $query = mysqli_query($database, "SELECT * FROM users WHERE USERNAME = '$checkUsername'");
        
        if(!query)
        {
            die('ERROR: ' . mysqli_error($database));
        }
        
        if(mysqli_num_rows($query) > 0)
        {
            return false;
        }
        
        $emailQuery = mysqli_query($database, "SELECT * FROM users WHERE EMAIL_ADDRESS = '$checkEmail'");
        
        if(mysqli_num_rows($emailQuery) > 0)
        {
            return false;
        }
        
        $sql = $database->prepare("INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, USERNAME, PASSWORD, ROLE) VALUES (?,?,?,?,?,?)");
        
        $firstName = $person->getFirstName();
        $lastName = $person->getLastName();
        $email = $person->getEmail();
        $username = $person->getUsername();
        $password = $person->getPassword();
        $role = $person->getRole();
        
        $sql->bind_param("sssssi", $firstName, $lastName, $email, $username, $password, $role);
        $sql->execute();
        
        if($sql->affected_rows > 0)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function findByID($userID)
    {
        $database = dbConnection();
        $sql = "SELECT * FROM users WHERE USER_ID = " . $userID;
        $result = mysqli_query($database, $sql);
        
        if(mysqli_num_rows($result) == 0)
        {
            $result->free();
            mysqli_close($database);
        }
        elseif(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            $user = new User($row["FIRST_NAME"], $row["LAST_NAME"], $row["EMAIL_ADDRESS"], 
                $row["USERNAME"], $row["PASSWORD"], $row["ROLE"]);
            $result->free();
            mysqli_close($database);
            return $user;
        }
        return null;
    }
    
    function updateUserInfo($user, $ID)
    {
        $database = dbConnection();
        
        $query = $database->prepare("UPDATE users SET FIRST_NAME=?, LAST_NAME=?, EMAIL_ADDRESS=?, USERNAME=?, PASSWORD=?, 
            ROLE=? WHERE USER_ID=?");
        $query->bind_param('sssssii', $user->getFirstName(), $user->getLastName(), $user->getEmail(),
            $user->getUsername(), $user->getPassword(), $user->getRole(), $ID);
        $query->execute();
        if($query)
        {
            return true;
        }
        else 
        {
            return false;    
        }
    }
    
    function banUser($ID)
    {
        $database = dbConnection();
        
        $query = $database->prepare("UPDATE users SET BANNED='Y' WHERE USER_ID=?");
        $query->bind_param('i', $ID);
        $query->execute();
        if($query)
        {
            return true;
        }
        else 
        {
            return false;    
        }
    }
    
    function unbanUser($ID)
    {
        $database = dbConnection();
        
        $query = $database->prepare("UPDATE users SET BANNED='N' WHERE USER_ID=?");
        $query->bind_param('i', $ID);
        $query->execute();
        if($query)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function deleteUser($ID)
    {
        $database = dbConnection();
        
        $query = "DELETE FROM users WHERE USER_ID = " . $ID;
        
        if($database->query($query) === TRUE)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

?>