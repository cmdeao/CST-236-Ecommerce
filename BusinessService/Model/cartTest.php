<?php
require_once '../../Autoloader.php';
use BusinessService\Model\Cart;
require_once 'Cart.php';
require_once '../ProductBusinessService.php';
require_once 'Product.php';
require_once '../functions.php';

$cart = new Cart(1);
$bs = new ProductBusinessService();

$prod1 = $bs->searchByID(11);
$prod2 = $bs->searchByID(13);
$prod3 = $bs->searchByID(15);

$cart->addItem(11);
$cart->addItem(11);
$cart->addItem(11);

$cart->addItem(12);

echo "<pre>";
print_r($cart);
echo "</pre>";

$cart->updateQty(11, 13);
echo "<pre>";
print_r($cart);
echo "</pre>";


$cart->calcTotal();
echo "<pre>";
print_r($cart);
echo "</pre>";
?>