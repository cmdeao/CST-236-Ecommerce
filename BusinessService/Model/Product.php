<?php
namespace BusinessService\Model;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    
    public function __construct($id, $name, $desc, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }
    
    public function getID()
    {
        return $this->id;
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