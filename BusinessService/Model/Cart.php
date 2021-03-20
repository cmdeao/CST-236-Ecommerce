<?php
namespace BusinessService\Model;

class Cart
{
    private $userid;
    private $items = array();
    private $subtotals = array();
    private $total_price;
    
    public function __construct($userid)
    {
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->total_price = 0;
    }
    
    function addItem($product_id)
    {
        if(array_key_exists($product_id, $this->items))
        {
            $this->items[$product_id] += 1;
        }
        else 
        {
            $this->items = $this->items + array($product_id => 1);
        }
    }
    
    function calcTotal()
    {
        $service = new \ProductBusinessService();
        $subArray = array();
        $this->total_price = 0;
        foreach($this->items as $item=>$qty)
        {
            $product = $service->searchByID($item);
            $item_subtotal= $product->getPrice() * $qty;
            $subArray = $subArray + array($item => $item_subtotal);
            $this->total_price = $this->total_price + $item_subtotal;
        }
        
        $this->subtotals = $subArray;
    }
    
    function updateQty($product_id, $newqty)
    {
        if(array_key_exists($product_id, $this->items))
        {
            $this->items[$product_id] = $newqty;
        }
        else 
        {
            $this->items = $this->items + array($product_id => $newqty);
        }
        
        if($this->items[$product_id] == 0)
        {
            unset($this->items[$product_id]);
        }
    }
    
    public function getUserid()
    {
        return $this->userid;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getSubtotals()
    {
        return $this->subtotals;
    }

    public function getTotal_price()
    {
        return $this->total_price;
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }
}

?>