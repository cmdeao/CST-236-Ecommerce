<?php

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $username;
    
    public function __construct($firstName, $lastName, $emailAddress, $userName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $emailAddress;
        $this->username = $userName;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
}

?>