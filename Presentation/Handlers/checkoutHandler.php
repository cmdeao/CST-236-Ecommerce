<?php
use BusinessService\CardSecurity;
use BusinessService\OrdersBusinessService;
use BusinessService\Model\Cart;
use BusinessService\Model\Order;
require_once '../../BusinessService/CardSecurity.php';
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Order.php';
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
    $order = new Order(1, date("Y/m/d H:i:s"), getUserID(), 1, $subTotal);
    $service->checkOut($order, $cart);
    
    $finishedCart = new Cart($_SESSION['USER_ID']);
    $finishedCart->setItems($cart->getItems());
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