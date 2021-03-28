<?php 
require_once '../../header.php';
?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Home Page</title>
</head>
<body>

<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<hr size="5" noshade>
<h1 style="text-align:center;">Welcome to the application!</h1>
<form style="text-align:center;" action="../Handlers/homeHandler.php" method="POST">
	<input type="submit" name="products" class="customButton" value="View All Products">
</form>
</body>
</html>