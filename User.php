<?php

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $username;
    
    public function __construct($firstName, $lastName, $email, $uName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->username = $uName;
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