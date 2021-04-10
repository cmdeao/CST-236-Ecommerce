<?php
use BusinessService\CardSecurity;
use BusinessService\OrdersBusinessService;
use BusinessService\Model\Cart;
use BusinessService\Model\Order;
require_once '../../BusinessService/CardSecurity.php';
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Order.php';
require_once '../../BusinessService/UserBusinessService.php';
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/OrdersBusinessService.php';
include '../../BusinessService/functions.php';

if(isset($_POST['checkout']))
{
    header("Location: ../Views/checkout.php");
    exit;
}

session_start();
if(isset($_SESSION['cart']))
{
    $cart = $_SESSION['cart'];
}

$owner = trim($_POST['cardOwner']);
$number = trim($_POST['cardNumber']);
$month = $_POST['month'];
$year = $_POST['year'];
$cvv = trim($_POST['cvv']);
$coupon = trim($_POST['coupon']);
$couponID = NULL;
$originalPrice = $cart->getTotal_price();

if(!empty($_POST['coupon']))
{
    $service = new OrdersBusinessService();
    $coupon = $service->applyCoupon($coupon);
    if($coupon === FALSE)
    {
        header("refresh: 0; url=../Views/checkout.php");
        echo '<script type="text/javascript">alert("Invalid coupon entered!");</script>';
        exit;
    }
    else 
    {
        $couponID = $coupon[0]['COUPON_ID'];
    }
}

if($coupon)
{
       $userService = new UserBusinessService();
       if($userService->storeUsedCoupon($couponID))
       {
           applyCoupon($cart, $coupon);
       }
       else 
       {
           header("refresh: 0; url=../Views/checkout.php");
           echo '<script type="text/javascript">alert("This coupon has already been redeemed!");</script>';
           exit;
       }
}

function applyCoupon($cart, $coupon)
{
    $total = $cart->getTotal_price();
    
    if($coupon[0]['DISCOUNT_TYPE'] == 'Percentage' && $coupon[0]['ENABLED'] == TRUE)
    {
        $discount = number_format($total * $coupon[0]['DISCOUNT']/pow(10,2), 2, '.','');
        $total = $total - $discount;
        $cart->setTotal_price($total);
    }
    elseif($coupon[0]['DISCOUNT_TYPE'] == 'Dollar' && $coupon[0]['ENABLED'] == TRUE) 
    {
        $total = $total - $coupon[0]['DISCOUNT'];
        $cart->setTotal_price($total);
    }
}

if(isset($_POST['saveCard']))
{
    $service = new CardSecurity($owner, $cvv, $number, $month, $year);
    if(!$service->storeCard())
    {
        echo "Could not store card!";
        exit;
    }
    else 
    {
        header("Location: ../Views/checkout.php");
        exit;
    }
}

$service = new CardSecurity($owner, $cvv, $number, $month, $year);
$prodService = new ProductBusinessService();

if($service->authenticateCard())
{
    $service = new OrdersBusinessService();
    $subTotal = $cart->getTotal_price();
    $order = new Order(1, date("Y/m/d H:i:s"), getUserID(), 1, $subTotal, $couponID);
    $service->checkOut($order, $cart, $originalPrice);
    
    $finishedCart = new Cart($_SESSION['USER_ID']);
    $finishedCart->setItems($cart->getItems());
    $finishedCart->setTotal_price($cart->getTotal_price());
    $_SESSION['receiptCart'] = $finishedCart;
    
    foreach($cart->getItems() as $product_id => $qty)
    {
        $cart->updateQty($product_id, 0);
        
        if($prodService->removeFromCart($product_id))
        {
            $_SESSION['cart'] = $cart;
        }
    }
    header("Location: ../Views/orderReceipt.php");
}
else
{
    echo "FAILED!!";
}
?>