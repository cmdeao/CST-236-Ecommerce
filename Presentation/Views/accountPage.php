<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Account Page</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
<a href="../Views/homePage.html">Home Page</a>
<a href="../Views/aboutPage.html">About</a>
<form action="../Handlers/homeHandler.php" method="POST">
<a><input type="submit" class="customButton2" value="Account" name="account"></a>
<a><input type="submit" class="customButton2" value="Logout" name="logout"></a>
</form>
</div>
<hr size="5" noshade>

<div class="row">
	<div class="column" style="border-right: double;">
		<br>
		<img src="../../Images/Blank_Profile.png" width="250" height="250">
	</div>
	<div class="column">
		<h1>
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
		</h1>
	</div>
</div>
</body>
</html>