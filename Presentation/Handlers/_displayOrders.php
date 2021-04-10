<?php
require_once '../../header.php';
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
<title>Orders Report</title>
</head>
<body style="background-color:powderblue;">
<h1 style="text-align: center;">Orders Report:</h1>

<h3><?php echo "Start Date: " . $firstDate . "<br><br>" . "End Date: " . $secondDate; ?></h3><br>

<form action="../Handlers/productHandler.php" method="POST">
<table id="products" class="display">
<thead>
	<tr>
		<th>Order ID</th>
		<th>Purchase Date</th>
		<th>User ID/Name</th>
		<th>Original Price</th>
		<th>Final Price</th>
		<th>Coupon ID</th>
		<th>Discount</th>
	</tr>
</thead>

<tbody>
<?php 
for($x=0; $x < count($orders); $x++)
{   
       echo "<tr>";
           echo "<td>" . $orders[$x]['ID'] . "</td>";
           echo "<td><a href='../Views/showSingleOrder.php?id=" . $orders[$x]['ID'] . "'>" . $orders[$x]['DATE'] . "</a></td>";
           echo "<td>" . $orders[$x]['USER_ID'] . " / " . $orders[$x]['FIRST_NAME'] . "</td>";
           echo "<td>" . "$" . number_format((float) $orders[$x]['ORIGINAL_PRICE'], 2, '.', '') . "</td>";
           echo "<td>" . "$" . number_format((float) $orders[$x]['FINAL_PRICE'], 2, '.', '') . "</td>";
           if(empty($orders[$x]['USED_COUPON']))
           {
               echo "<td>" . "NULL" . "</td>";
           }
           else
           {
               echo "<td>" . $orders[$x]['USED_COUPON'] . "</td>";
           }
           if($orders[$x]['DISCOUNT_TYPE'] == 'Percentage')
           {
               echo "<td>" . round($orders[$x]['DISCOUNT'], 0) . "%" . "</td>";
           }
           elseif($orders[$x]['DISCOUNT_TYPE'] == 'Dollar')
           {
               echo "<td>" . "$" . $orders[$x]['DISCOUNT'] . "</td>";
           }
           else
           {
               echo "<td>" . "NULL" . "</td>";
           }
       echo "</tr>"; 
}
?>
</tbody>
</table>
</form>
<script>
	$(document).ready( function () {
		$('#products').DataTable();
	});	
</script>
</body>