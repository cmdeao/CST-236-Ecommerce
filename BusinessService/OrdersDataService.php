<?php
namespace BusinessService;

class OrdersDataService
{
    function createNew($order, $conn)
    {
        $sql = $conn->prepare("INSERT INTO orders (DATE, USERS_ID, ADDRESSES_ID, TOTAL_PRICE) VALUES (?,?,?,?)");
        if(!$sql)
        {
            echo "Could not bind statement";
            return -1;
        }

        $date = $order->getDate();
        $userID = $order->getUserID();
        $addressID = $order->getAddressID();
        $totalPrice = $order->getTotalPrice();
        
        $sql->bind_param('siid', $date, $userID, $addressID, $totalPrice);
        
        $sql->execute();
        
        if($sql)
        {
            return $conn->insert_id;
        }
        else
        {
            
            return 0;
        }
    }
    
    function addDetailsLine($orderID, $orderDetails, $conn)
    {
        $statement = $conn->prepare("INSERT INTO orderdetails (ORDERS_ID, PRODUCTS_ID, QUANTITY, CURRENT_PRICE, CURRENT_DESCRIPTION) VALUES
        (?,?,?,?,?)");
        
        if(!$statement)
        {
            echo "Could not bind statement";
            return -1;
        }
        
        $productID = $orderDetails->getProductID();
        $quantity = $orderDetails->getQuantity();
        $price = $orderDetails->getCurrentPrice();
        $description = $orderDetails->getCurrentDesc();
        
        $statement->bind_param("iiids", $orderID, $productID, $quantity, $price, $description);
        $statement->execute();
        
        if($statement)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}

?>