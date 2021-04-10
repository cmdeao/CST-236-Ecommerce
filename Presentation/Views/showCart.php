<?php
use BusinessService\Model\Cart;
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Product.php';
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/UserBusinessService.php';

require_once '../../BusinessService/functions.php';
require_once '../../header.php';
session_start();

$totalItems = 0;

$productService = new ProductBusinessService();
$userService = new UserBusinessService();

if(isset($_SESSION['cart']))
{
    $cart = $_SESSION['cart'];
    $cart->calcTotal();
}
else
{
    echo "Nothing is in the cart<br>";
    exit;
}

if(isset($_SESSION['USER_ID']))
{
    $userID = $_SESSION['USER_ID'];
}
else 
{
    echo "Please log into the application<br>";
    exit;
}

echo "<body style='background-color:powderblue;'>";
echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
echo "</head>";
echo "<body>";
echo "<br><h1> Shopping Cart </h1><br>";
echo "<table class='table table-bordered table-light'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th scope='col'>Remove Items</th>";
            echo "<th scope='col'>Name</th>";
            echo "<th scope='col'>Description</th>";
            echo "<th scope='col'>Quantity</th>";
            echo "<th scope='col'>Price</th>";
            echo "<th scope='col'>Sub Total</th>";
        echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach($cart->getItems() as $product_id => $qty)
{
    
    $product = $productService->searchByID($product_id);
    echo "<tr>";
    
    echo "<td>";
    echo "<form action='../Handlers/updateQuantity.php' method='POST'>";
    echo "<input type='hidden' id='itemID' name='itemID' value=" . $product->getID() . ">";
    echo "<input class='btn btn-default btn-sm' type='submit' name='trash' value='Trash'>";
    echo "</form>";
    echo "</td>";
    
    echo "<td>" . $product->getName() . "</td>";
    echo "<td>" . $product->getDescription() . "</td>";
    
    echo "<td>";
    echo "<form action='../Handlers/updateQuantity.php' method='POST'>";
    echo "<input type='hidden' id='itemID' name='itemID' value=" . $product->getID() . ">";
    echo "<span class='input-group-text'>";
    echo "<input class='form-control' type='text' name='qty' value = " . $qty . ">";
    echo "<input class='btn btn-secondary' type='submit' name='submit' value='update'>";
    echo "</span>";
    echo "</form>";
    echo "</td>";
    
    echo "<td> $" . number_format((float)$product->getPrice(), 2, '.', '') . "</td>";
    echo "<td> $" . number_format((float)$qty * $product->getPrice(), 2, '.', '') . "</td>";
    $totalItems = $totalItems += $qty;
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "<h1 style='text-align:center;'>Subtotal (" . $totalItems . " items): $" . number_format((float)$cart->getTotal_price(), 2, '.', '') . "</h1>";

echo "<form action='../Handlers/checkoutHandler.php' method='POST' style='text-align:center;'>";
echo "<h2 style='text-align:center;'>Please come back later to checkout.</h2>";
echo "<input class='button' type='submit' name='checkout' value='Checkout'>";
echo "</form>";

echo "</body>";
echo "</html>";
?>