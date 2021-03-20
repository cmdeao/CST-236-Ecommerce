<?php
require_once '../../header.php';
?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>New Product</title>
</head>
<body>
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<h1 style="text-align:center;">
Add a new product to the application.
</h1>
<br>
<form action="../Handlers/newProductHandler.php" method="POST" style="text-align:center;">
	<label for="productName">Name:</label>
	<input type="text" id="productName" name="productName" required><br>
	<label for="productDesc">Description:</label>
	<input type="text" id="productDesc" name="productDesc" required><br>
	<label for="price">Price:</label>
	<input type="number" id="price" name="price" min="5" max="100" step=".01" required><br>
	<input type="submit" value="Add Product">
</form>
</body>
</html>