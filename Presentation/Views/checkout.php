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
<form action="../Handlers/checkoutHandler.php" method="POST" style="text-align: center;">
	<label for="cardOwner">Name:</label>
	<input type="text" id="cardOwner" name="cardOwner" required><br>
	<label for="cardNumber">Credit Card Number:</label>
	<input type="text" id="cardNumber" name="cardNumber" required maxlength="16"><br><br>
	<div class="form-group" id="expiration-date">
	<label>Expiration:</label>
	<select name="month" required>
	<option value="01">January</option>
	<option value="02">February</option>
	<option value="03">March</option>
	<option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
	</select>
	<select name="year" required>
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	<option value="2020">2020</option>
	<option value="2021">2021</option>
	<option value="2022">2022</option>
	<option value="2023">2023</option>
	</select>
	</div><br>
	<label for="cvv">CVV:</label>
	<input type="text" id="cvv" name="cvv" required maxlength="3"><br><br>
	<label for="coupon">Coupon Code:</label>
	<input type="text" id="coupon" name="coupon"><br><br>
	<input type="submit" name="process" value="Checkout!"><br><br>
	<input type="submit" name="saveCard" value="Save Card">
</form>
</body>
</html>