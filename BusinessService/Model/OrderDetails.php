<?php
namespace BusinessService\Model;

class OrderDetails
{
    private $id;
    private $orderID;
    private $productID;
    private $quantity;
    private $currentPrice;
    private $currentDesc;
    
    function __construct($id, $orderID, $productID, $quantity, $currentPrice, $currentDesc)
    {
        $this->id = $id;
        $this->orderID = $orderID;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->currentPrice = $currentPrice;
        $this->currentDesc = $currentDesc;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    public function getCurrentDesc()
    {
        return $this->currentDesc;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    public function setCurrentDesc($currentDesc)
    {
        $this->currentDesc = $currentDesc;
    }
}

?>