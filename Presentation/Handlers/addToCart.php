<?php
use BusinessService\Model\Product;
use BusinessService\Model\Cart;
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Product.php';
require_once '../../BusinessService/ProductBusinessService.php';

include '../../BusinessService/functions.php';

session_start();
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

$id = $_POST['itemID'];
$qty = $_POST['quantity'];
$service = new ProductBusinessService();
$prod = $service->searchByID($id);

$cart->updateQty($id, $qty);
$cart->calcTotal();

if($service->addToCart($id, $qty))
{
    $_SESSION['cart'] = $cart;
    header("Location: ../Views/showCart.php");
}
else 
{
    echo "Could not add item to cart!";
    exit;
}

?>