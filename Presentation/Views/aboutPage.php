<?php 
require_once '../../header.php';
?>
<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>About Page</title>
</head>
<body>
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<h1 style="text-align:center;">
This is an eccomerce application.
<br>
This application revolves around selling grocery products and showcasing various features.
<br>
More features will be added to the application as the weeks progress.
</h1>
</body>
</html>