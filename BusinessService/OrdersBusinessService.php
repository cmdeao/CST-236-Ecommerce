<?php
namespace BusinessService;
use BusinessService\Model\Order;
use BusinessService\Model\OrderDetails;
require_once 'Database.php';
require_once 'Model/Product.php';
require_once 'Model/Order.php';
require_once 'Model/OrderDetails.php';
require_once 'ProductBusinessService.php';
require_once 'OrdersDataService.php';

class OrdersBusinessService
{   
    function checkOut($order, $cart, $originalPrice)
    {
        $detailsID = 0;
        $database = new Database();
        $conn = $database->getConnection();
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        $orderService = new OrdersDataService();
        $productService = new \ProductBusinessService();
        
        $orderID = $orderService->createNew($order, $conn, $originalPrice);
        
        foreach($cart->getItems() as $product_id => $qty)
        {
            $product = $productService->searchByID($product_id);
            
            
            $prodID = $product->getID();
            $prodName = $product->getName();
            $prodDesc = $product->getDescription();
            $prodPrice = $product->getPrice();
            
            $orderDetails = new OrderDetails(1, $orderID, $prodID, $qty, $prodPrice, $prodDesc);
            $detailsID = $orderService->addDetailsLine($orderID, $orderDetails, $conn);
            
            if($detailsID > 0)
            {
                $conn->commit();
            }
            else
            {
                $conn->rollback();    
            }
        }
        
        if($orderID > 0 && $detailsID > 0)
        {
            $conn->commit();
            session_start();
            $_SESSION['prevOrderNumber'] = $orderID;
        }
        else
        {
            $conn->rollback();
        }
        $conn->close();
    }
    
    function getOrdersBetweenDates($date1, $date2)
    {
        $service = new OrdersDataService();
        return $service->getOrdersInDates($date1, $date2);
    }
    
    function getSingleOrder($orderID)
    {
        $service = new OrdersDataService();
        return $service->getSingleOrder($orderID);
    }
    
    function applyCoupon($couponCode)
    {
        $service = new OrdersDataService();
        return $service->findCoupon($couponCode);
    }
}

?>