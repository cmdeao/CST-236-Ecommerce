<?php

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
<title>Display Products</title>
</head>
<body>
<form action="../Handlers/productHandler.php" method="POST">
<table id="products" class="display">
<thead>
	<tr>
		<th>Product Name</th>
		<th>Product Description</th>
		<th>Product Price</th>
		<th>View Item</th>
	</tr>
</thead>

<tbody>
<?php 
for($x=0; $x < count($products); $x++)
{
    echo "<tr>";
        echo "<td>" . $products[$x][1] . "</td>" . "<td>" .
            $products[$x][2] . "</td>" . "</td>" . "<td>" . $products[$x][3] . "</td>" . "<td>" . "<button name='view' type='submit' value=". $products[$x][0] .">View</button></td>";
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