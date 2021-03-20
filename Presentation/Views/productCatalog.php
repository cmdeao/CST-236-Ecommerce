<?php 
include '../../BusinessService/functions.php';
require_once '../../header.php';
require_once '../../BusinessService/Model/Product.php';
require_once '../../BusinessService/ProductBusinessService.php';


$service = new ProductBusinessService();
$products = $service->getAllProducts();
?>
<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Product Catalog</title>
</head>
<body>
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<br>
<?php include '../Handlers/_displayAllProducts.php'; ?>
</body>
</html>