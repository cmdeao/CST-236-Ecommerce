<?php
require_once '../../header.php';
?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Checkout Process</title>
</head>
<body>

<h1 style="text-align:center;">
Checkout!
</h1>
<br>
<h2 style="text-align:center;">Check back soon! The checkout process will be available soon!</h2>
<form action="../Handlers/checkoutHandler.php" method="POST" style="text-align: center;">
	<label for="cardNumber">Credit Card Number*</label>
	<input type="text" id="cardNumber" name="cardNumber" required><br>
	<label for="expiration">Expiration Date*</label>
	<input type="month" id="expiration" name="expiration" required><br><br>
	<input type="submit" name="process" value="Checkout!" disabled>
</form>
</body>
</html>