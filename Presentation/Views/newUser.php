<?php
require_once '../../header.php';
?>
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
Add a new user to the application.
</h1>
<br>
<form action="../Handlers/newUserHandler.php" method="POST" style="text-align:center;">
	<label for="firstname">*First Name:</label>
	<input type="text" id="firstname" name="firstname" required><br>
	<label for="lastname">*Last Name:</label>
	<input type="text" id="lastname" name="lastname" required><br>
	<label for="emailaddress">*Email Address:</label>
	<input type="email" id="emailaddress" name="emailaddress" required><br>
	<label for="username">*Username:</label>
	<input type="text" id="username" name="username" required><br>
	<label for="password">*Password:</label>
	<input type="password" id="password" name="passsword" required><br>
	<label for="role">*Role Number:</label>
	<input type="number" id="role" name="role" min="1" max="5" required><br>
	<input type="submit" value="Add User">
</form>
</body>
</html>