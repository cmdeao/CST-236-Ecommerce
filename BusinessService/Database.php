<?php
namespace BusinessService;

class Database
{
    private $server = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "cst-236-ecommerce";
    
    public function getConnection()
    {
        $link = new \mysqli($this->server, $this->username, $this->password, $this->database);
        if($link === false)
        {
            die("ERROR: Connection failed: " . mysqli_connect_error());
        }
        return $link;
    }
}

