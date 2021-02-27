<?php

require_once 'User.php';

class Security
{
    private $username;
    private $password;
    
    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function authenticateUser()
    {
        $link = dbConnection();
        
        $sql= "SELECT * FROM users WHERE USERNAME = '$this->username' AND PASSWORD = '$this->password'";
        $result = mysqli_query($link, $sql);
        
        if(mysqli_num_rows($result) == 0)
        {
            $result->free();
            mysqli_close($link);
            return false;
        }
        elseif(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            
            if($row["BANNED"] === 'Y')
            {
                echo "You are banned from the application.";
                exit;
            }
            
            $user = new User($row["FIRST_NAME"], $row["LAST_NAME"], $row["EMAIL_ADDRESS"], $row["USERNAME"]);
            
            logUser($user);
            saveUserID($row["USER_ID"]);
            
            $result->free();
            mysqli_close($link);
            return true;
        }
        else
        {
            die("ERROR: Connection error occurred: " . mysqli_connect_error());
        }
        $result->free();
        mysqli_close($link);
    }
}

?>