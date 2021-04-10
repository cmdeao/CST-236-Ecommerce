<?php
namespace BusinessService\Model;

class Order
{
    private $id;
    private $date;
    private $userID;
    private $addressID;
    private $totalPrice;
    private $couponID;
    
    function __construct($id, $date, $userID, $addressID, $price, $couponID)
    {
        $this->id = $id;
        $this->date = $date;
        $this->userID = $userID;
        $this->addressID = $addressID;
        $this->totalPrice = $price;
        $this->couponID = $couponID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getAddressID()
    {
        return $this->addressID;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    
    public function getCouponID()
    {
        return $this->couponID;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setAddressID($addressID)
    {
        $this->addressID = $addressID;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }
    
    public function setCouponID($couponID)
    {
        $this->couponID = $couponID;
    }
}

?>