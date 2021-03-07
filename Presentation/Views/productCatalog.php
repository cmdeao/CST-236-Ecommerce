<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../style.css">
<title>Product Catalog</title>
</head>
<body>

<div class="topnav">
<a href="../Views/homePage.html">Home Page</a>
<a href="../Views/aboutPage.html">About</a>
<form action="../Handlers/homeHandler.php" method="POST">
<a><input type="submit" class="customButton2" value="Account" name="account"></a>
<a><input type="submit" class="customButton2" value="Logout" name="logout"></a>
</form>
</div>
<br>
<?php include '../Handlers/_displayAllProducts.php'; ?>
</body>
</html>