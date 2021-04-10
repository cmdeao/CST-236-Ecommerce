<?php
namespace BusinessService;

class OrdersDataService
{
    function createNew($order, $conn, $originalPrice)
    {
        $sql = $conn->prepare("INSERT INTO orders (DATE, USERS_ID, ADDRESSES_ID, ORIGINAL_PRICE, FINAL_PRICE, USED_COUPON) VALUES (?,?,?,?,?,?)");
        if(!$sql)
        {
            echo "Could not bind statement";
            return -1;
        }

        $date = $order->getDate();
        $userID = $order->getUserID();
        $addressID = $order->getAddressID();
        $totalPrice = $order->getTotalPrice();
        $couponID = $order->getCouponID();
        
        $sql->bind_param('siiddi', $date, $userID, $addressID, $originalPrice, $totalPrice, $couponID);
        
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
    
    function getOrdersInDates($date1, $date2)
    {
        $database = dbConnection();
        
        $sql = "SELECT orders.ID,
        orders.DATE,
        users.USER_ID,
        users.FIRST_NAME,
        orders.ORIGINAL_PRICE,
        orders.FINAL_PRICE,
        orders.USED_COUPON,
        coupons.DISCOUNT_TYPE,
        coupons.DISCOUNT
        FROM orders
        JOIN users ON users.USER_ID = orders.USERS_ID
        LEFT JOIN coupons ON coupons.COUPON_ID = orders.USED_COUPON
        WHERE orders.DATE BETWEEN '$date1' AND '$date2' 
        ORDER by orders.FINAL_PRICE DESC";

        $result = mysqli_query($database, $sql);
        $orders = array();
        while($row = $result->fetch_assoc())
        {
            array_push($orders, $row);
        }

        $result->free();
        mysqli_close($database);
        
        return $orders;
    }
    
    function getSingleOrder($orderID)
    {
        $database = dbConnection();

        $sql = "SELECT orders.ID,
        orders.DATE,
        orders.ORIGINAL_PRICE,
        orders.FINAL_PRICE,
        orderdetails.QUANTITY,
        orderdetails.CURRENT_PRICE,
        products.ID AS 'PROD_ID',
        products.PRODUCT_NAME,
        orders.USED_COUPON,
        coupons.DISCOUNT_TYPE,
        coupons.DISCOUNT
        FROM orders
        JOIN orderdetails ON orderdetails.ORDERS_ID = '$orderID'
        JOIN products ON products.ID = orderdetails.PRODUCTS_ID
        LEFT JOIN coupons ON coupons.COUPON_ID = orders.USED_COUPON
        WHERE orders.ID = '$orderID'
        ORDER by orderdetails.QUANTITY DESC";
        
        $result = mysqli_query($database, $sql);
        $order = array();
        
        while($row = $result->fetch_assoc())
        {
            array_push($order, $row);
        }
        $result->free();
        mysqli_close($database);
        return $order;
    }
    
    function findCoupon($couponCode)
    {
        $database = dbConnection();
        
        $sql = "SELECT * FROM coupons WHERE CODE = '$couponCode'"; 
        $result = mysqli_query($database, $sql);
        
        if(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            $coupon = array();
            array_push($coupon, $row);
            $result->free();
            mysqli_close($database);
            return $coupon;
        }
        else
        {
            $result->free();
            mysqli_close($database);
            return false;
        }
    }
}

?>