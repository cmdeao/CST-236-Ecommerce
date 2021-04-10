<?php
require_once '../../header.php';
?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Orders Report Generator</title>
</head>
<body>
<br>
<h1 style="text-align: center;">Generate Sales Report:</h1>

<form action="../Handlers/orderReportHandler.php">
	<div class="form-group">
		<label for="firstDate">
		First Date:
		</label>
		<input class="form-control" name="firstDate" type="date"><br>
		
		<label for="secondDate">
		Second Date:
		</label>
		<input class="form-control" name="secondDate" type="date"><br>
	</div>
	<input type="submit" name="generate" value="Generate Report">
</form>
</body>
</html>