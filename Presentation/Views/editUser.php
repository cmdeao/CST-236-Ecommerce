<?php
require_once '../../header.php';
require_once '../../BusinessService/Model/User.php';
require_once '../../BusinessService/functions.php';
require_once '../../BusinessService/UserBusinessService.php';
$userID = getTempID();
$service = new UserBusinessService();
$user = $service->getUserByID($userID);

?>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Edit User</title>
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
	<label for="firstname">*First Name:</label>
	<input type="text" id="firstname" name="firstname" value="<?php echo $user->getFirstName(); ?>" required><br>
	<label for="lastname">*Last Name:</label>
	<input type="text" id="lastname" name="lastname" value="<?php echo $user->getLastName(); ?>" required><br>
	<label for="emailaddress">*Email Address:</label>
	<input type="email" id="emailaddress" name="emailaddress" value="<?php echo $user->getEmail(); ?>" required><br>
	<label for="username">*Username:</label>
	<input type="text" id="username" name="username" value="<?php echo $user->getUsername(); ?>" required><br>
	<label for="password">*Password:</label>
	<input type="password" id="password" name="password" value="<?php echo $user->getPassword(); ?>" required><br>
	<label for="role">*Role Number:</label>
	<input type="number" id="role" name="role" min="1" max="5" value="<?php echo $user->getRole(); ?>" required><br>
	<input type="submit" name="update" value="Edit User">
</form>
</body>
</html>