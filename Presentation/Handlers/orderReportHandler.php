<?php
use BusinessService\OrdersBusinessService;

require_once '../../BusinessService/OrdersBusinessService.php';
include '../../BusinessService/functions.php';
$firstDate = trim($_GET["firstDate"]);
$secondDate = trim($_GET["secondDate"]);

if($firstDate > $secondDate)
{
    header("refresh: 0; url=../Views/ordersReportCreator.php");
    echo '<script type="text/javascript">alert("First date must be the lowest date!");</script>';
}
else
{
    $service = new OrdersBusinessService();
    $orders = $service->getOrdersBetweenDates($firstDate, $secondDate);
    include '_displayOrders.php';
}
?>