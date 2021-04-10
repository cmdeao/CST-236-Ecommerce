<?php

use BusinessService\Model\Product;
use BusinessService\Model\Cart;

require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Product.php';
require_once '../../BusinessService/ProductBusinessService.php';

include '../../BusinessService/functions.php';

session_start();
$service = new ProductBusinessService();
if(isset($_SESSION['cart']))
{
    $cart = $_SESSION['cart'];
}
else
{
    if(isset($_SESSION['USER_ID']))
    {
        $cart = new Cart($_SESSION['USER_ID']);
    }
    else
    {
        echo "Please login to the application first!";
        exit;
    }
}

if(isset($_POST['trash']))
{
    $id = $_POST['itemID'];
    $cart->updateQty($id, 0);
    $cart->calcTotal();
    
    
    if($service->removeFromCart($id))
    {
        $_SESSION['cart'] = $cart;
        header("Location: ../Views/showCart.php");
        exit;
    }
    else
    {
        echo "Could not remove item from cart!";
        exit;
    }
}

$id = $_POST['itemID'];
$qty = $_POST['qty'];

$cart->updateQty($id, $qty);
$cart->calcTotal();

if($service->updateCartQuantity($id, $qty))
{
    $_SESSION['cart'] = $cart;
    header("Location: ../Views/showCart.php");
    exit;
}
else
{
    echo "Error updating quantity of item!";
    exit;
}

?>