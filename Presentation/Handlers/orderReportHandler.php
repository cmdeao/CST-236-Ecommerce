<?php
use BusinessService\OrdersBusinessService;

require_once '../../BusinessService/OrdersBusinessService.php';
include '../../BusinessService/functions.php';
$firstDate = trim($_GET["firstDate"]);
$secondDate = trim($_GET["secondDate"]);

if($firstDate > $secondDate)
{
    echo "The first date must be the lowest date.";
    exit;
}

$service = new OrdersBusinessService();
$orders = $service->getOrdersBetweenDates($firstDate, $secondDate);
include '_displayOrders.php';
?>