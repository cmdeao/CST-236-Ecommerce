<?php
namespace BusinessService\Model;

class Product
{
    private $name;
    private $description;
    private $price;
    
    public function __construct($name, $desc, $price)
    {
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }
    
    public function getName() 
    {
        return $this->name;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
}

?>