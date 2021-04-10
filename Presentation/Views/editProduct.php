<?php
require_once '../../header.php';

?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Edit Product</title>
</head>
<body>
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<h1 style="text-align:center;">
Edit user information
</h1>
<br>
<form action="../Handlers/adminHandler.php" method="POST" style="text-align:center;">
	<label for="productID">*ID:</label>
	<input type="text" id="productID" name="productID" value="<?php echo $product->getID(); ?>" readonly><br>
	<label for="productName">*Name:</label>
	<input type="text" id="productName" name="productName" value="<?php echo $product->getName(); ?>" required><br>
	<label for="productDesc">*Description:</label>
	<input type="text" id="productDesc" name="productDesc" value="<?php echo $product->getDescription(); ?>" required><br>
	<label for="price">*Price:</label>
	<input type="number" id="price" name="price" min="5" max="100" step=".01" value="<?php echo $product->getPrice(); ?>" required><br>
	<input type="submit" name="confirmEdit" value="Edit Product">
</form>
</body>
</html>