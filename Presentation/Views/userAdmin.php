<?php
require_once '../../header.php';
require_once '../../BusinessService/Model/User.php';
require_once '../../BusinessService/UserBusinessService.php';
$service = new UserBusinessService();
$users = $service->getAllUsers();
?>
<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>User Admin</title>
</head>
<body>
<form action="../Handlers/searchHandler.php" method="POST" style="text-align:center;">
	<input type="text" placeholder="Search..." name="search" style="height:30px; width:50%;">
	<input type="submit" value="Search" style="height:30px;">
</form>
<br>
<?php include '../Handlers/_displayAllUsers.php'; ?>
</body>
</html>