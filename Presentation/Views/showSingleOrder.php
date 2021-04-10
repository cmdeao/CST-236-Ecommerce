<?php
require_once '../../header.php';
use BusinessService\OrdersBusinessService;
require_once '../../BusinessService/OrdersBusinessService.php';
$orderID = $_GET['id'];
$service = new OrdersBusinessService();
$order = $service->getSingleOrder($orderID);
$orderCost = 0;
?>
<head>

<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<style>
    #products, #products th, #products td{
    border: 1px solid black;
    text-align: center;
    }
    
</style>
<meta charset="UTF-8">
<title>Single Order Report</title>
</head>
<body style="background-color:powderblue;">
<h1 style="text-align: center;">Orders Report:</h1>
<h3><?php echo "Order Details - Order #" . $order[0]['ID'];  ?></h3>
<form action="../Handlers/productHandler.php" method="POST">
<table id="products" class="display">
<thead>
	<tr>
		<th>Order ID</th>
		<th>Product ID</th>
		<th>Purchase Date</th>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Product Price</th>
		<th>Subtotal</th>
	</tr>
</thead>

<tbody>
<?php 
for($x=0; $x < count($order); $x++)
{
    $subTotal = 0;
    $subTotal = $order[$x]['CURRENT_PRICE'] * $order[$x]['QUANTITY'];
    
    echo "<tr>";
        echo "<td>" . $order[$x]['ID'] . "</td>";
        echo "<td>" .$order[$x]['PROD_ID'] . "</td>"; 
        echo "<td>" . $order[$x]['DATE'] . "</td>";
        echo "<td>" . $order[$x]['PRODUCT_NAME'] . "</td>";
        echo "<td>" . $order[$x]['QUANTITY'] . "</td>";
        echo "<td>$" . number_format((float) $order[$x]['CURRENT_PRICE'], 2, '.', '') . "</td>";
        echo "<td> $" . number_format((float) $subTotal, 2, '.', '') . "</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
</form>

<?php 
  if(!empty($order[0]['USED_COUPON']) && $order[0]['DISCOUNT_TYPE'] == 'Percentage')
  {
      echo "<h2 style='text-align: center;'>Original Cost: $" . number_format($order[0]['ORIGINAL_PRICE'], 2, '.','') . "</h2>";
      echo "<h2 style='text-align: center;'>Coupon Discount: " . round($order[0]['DISCOUNT'], 0) . "%" . " - Coupon ID: " . $order[0]['USED_COUPON'] . "</h2>";
      $discountTotal = number_format((float) $order[0]['ORIGINAL_PRICE'], 2, '.', '') - number_format((float) $order[0]['FINAL_PRICE'], 2, '.', '');
      echo "<h2 style='text-align: center;'>Discount Total: $" . $discountTotal . "</h2>";
  }
  if(!empty($order[0]['USED_COUPON']) && $order[0]['DISCOUNT_TYPE'] == 'Dollar')
  {
      echo "<h2 style='text-align: center;'>Original Cost: $" . number_format($order[0]['ORIGINAL_PRICE'], 2, '.','') . "</h2>";
      echo "<h2 style='text-align: center;'>Coupon Discount: $" . $order[0]['DISCOUNT'] . " - Coupon ID: " . $order[0]['USED_COUPON'] . "</h2>";
      $discountTotal = number_format((float) $order[0]['ORIGINAL_PRICE'], 2, '.', '') - number_format((float) $order[0]['FINAL_PRICE'], 2, '.', '');
      echo "<h2 style='text-align: center;'>Discount Total: $" . $discountTotal . "</h2>";
  }
?>

<h2 style="text-align: center;">Order Cost: $<?php echo number_format((float) $order[0]['FINAL_PRICE'], 2, '.', '');?></h2>
<script>
	$(document).ready( function () {
		$('#products').DataTable({
			"order": [[4, "desc"]]
		});
	});	
</script>
</body>