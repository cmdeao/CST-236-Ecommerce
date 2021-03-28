<?php
require_once '../../header.php';
?>
<head>
<link rel="stylesheet" href="../style.css">
<meta charset="UTF-8">
<title>Display Products</title>
</head>

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
    	<form action="../Handlers/addToCart.php" method="POST">
    		<label for="quanity">Quantity:</label>
    		<input type="number" id="quantity" name="quantity" min="1" max="10">
    		<input type="hidden" id="itemID" name="itemID" value=<?php echo $product->getID(); ?>>
    		<input type="submit" value="Add To Cart">
    	</form>
    </div>
</div>>
</body>