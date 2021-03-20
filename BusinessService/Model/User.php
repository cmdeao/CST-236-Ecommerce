<?php

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $username;
    private $password;
    private $role;
    
    public function __construct($firstName, $lastName, $emailAddress, $userName, $password, $role)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $emailAddress;
        $this->username = $userName;
        $this->password = $password;
        $this->role = $role;
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
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getRole()
    {
        return $this->role;
    }
}

?>