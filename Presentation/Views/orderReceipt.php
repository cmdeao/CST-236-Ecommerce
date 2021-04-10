<?php
use BusinessService\Model\Cart;
use BusinessService\Model\Order;
require_once '../../BusinessService/Model/Cart.php';
require_once '../../BusinessService/Model/Order.php';
require_once '../../BusinessService/Model/Product.php';
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/UserBusinessService.php';

require_once '../../BusinessService/functions.php';
require_once '../../header.php';
session_start();

$totalItems = 0;

$productService = new ProductBusinessService();
$userService = new UserBusinessService();

if(isset($_SESSION['receiptCart']))
{
    $finishedCart = $_SESSION["receiptCart"];
    $orderNumber = $_SESSION['prevOrderNumber'];
    $items = $finishedCart->getItems();
    //$finishedCart->calcTotal();
}
else
{
    echo "Nothing is in the cart<br>";
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
echo "<br><h1 style='text-align:center;'>Order Details</h1>";
echo "<h2 style='text-align:center;'>Order Number - #" . $orderNumber . "</h2><br>";
echo "<table class='table table-bordered table-light'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>Name</th>";
echo "<th scope='col'>Description</th>";
echo "<th scope='col'>Quantity</th>";
echo "<th scope='col'>Price</th>";
echo "<th scope='col'>Sub Total</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach($finishedCart->getItems() as $product_id => $qty)
{
    $product = $productService->searchByID($product_id);
    echo "<tr>";
    echo "<td>" . $product->getName() . "</td>";
    echo "<td>" . $product->getDescription() . "</td>";
    echo "<td>" . $qty . "</td>";
    echo "<td> $" . number_format((float)$product->getPrice(), 2, '.', '') . "</td>";
    echo "<td> $" . number_format((float)$qty * $product->getPrice(), 2, '.', '') . "</td>";
    $totalItems = $totalItems += $qty;
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "<h2 style='text-align:center;'>Order Summary";
echo "<br>Item(s) Subtotal: $" . number_format((float)$finishedCart->getTotal_price(), 2, '.', '');
echo "<br>Estimated tax: $0.00";
echo "<br>Total Item(s): " . $totalItems . "</h2>";
echo "<h2 style='text-align:center; font-weight:bold;'>Grand Total: $" . number_format((float)$finishedCart->getTotal_price(), 2, '.', '') . "</h2>";
echo "</body>";
echo "</html>";
?>