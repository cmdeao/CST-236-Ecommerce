<?php

require_once '../../BusinessService/Model/User.php';
include '../../BusinessService/functions.php';

$user = getUser();
require_once '../../header.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Account Page</title>
</head>
<body style="background-color:powderblue;">
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<hr size="5" noshade>

<div class="row">
	<div class="column" style="border-right: double;">
		<br>
		<img src="../../Images/Blank_Profile.png" width="250" height="250">
	</div>
	<div class="column">
		<h2>
			First Name: <?php echo $user->getFirstName(); ?>
			<br>
			<br>
			Last Name: <?php echo $user->getLastName(); ?>
			<br>
			<br>
			Email Address: <?php echo $user->getEmail();?>
			<br>
			<br>
			Username: <?php echo $user->getUsername(); ?>
			<br>
			<br>
		</h2>
	</div>
</div>
</body>
</html>