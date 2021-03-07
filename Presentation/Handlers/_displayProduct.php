<?php

?>
<head>
<link rel="stylesheet" href="../style.css">
<meta charset="UTF-8">
<title>Display Products</title>
</head>
<div class="topnav">
<a href="../Views/homePage.html">Home Page</a>
<a href="../Views/aboutPage.html">About</a>
<form action="../Handlers/homeHandler.php" method="POST">
<a><input type="submit" class="customButton2" value="Account" name="account"></a>
<a><input type="submit" class="customButton2" value="Logout" name="logout"></a>
</form>
</div>

<body style="background-color: powderblue;">
<hr size="5" noshade>
<div class="row">
	<div class="column" style="border-right: double;">
		<br>
        <img src="../../Images/Product_Stock.png" width="400" height="222">
    </div>
    <div class="column">
    	<h1>
    		<?php echo " " . $product->getName(); ?> 
    	</h1>
    	<h2><?php echo " $" . $product->getPrice(); ?></h2>
    	<h2>Description: <?php echo $product->getDescription(); ?></h2>
    	<form>
    		<label for="quanity">Quantity:</label>
    		<input type="number" id="quantity" min="1" max="10">
    		<input type="submit" value="Add To Cart" disabled>
    	</form>
    	Please check back later for purchase!
    </div>
</div>>
</body>