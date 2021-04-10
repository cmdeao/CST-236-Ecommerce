<?php
use BusinessService\Model\Product;
use BusinessService\Model\Cart;

class ProductDataService
{
    function findAllProducts()
    {
        
        $database = dbConnection();
        
        $sql = "SELECT ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRICE FROM products";
        $result = mysqli_query($database, $sql);
        
        
        $index = 0;
        $products = array();
        
        while($row = $result->fetch_assoc())
        {
            $products[$index] = array($row["ID"], $row["PRODUCT_NAME"], $row["PRODUCT_DESCRIPTION"],
                $row["PRICE"]);
            ++$index;
        }
        
        $result->free();
        mysqli_close($database);
        return $products;
    }
    
    function makeNewProduct($newProduct)
    {
        $database = dbConnection();
        
        $name = $newProduct->getName();
        $desc = $newProduct->getDescription();
        $price = $newProduct->getPrice();

        $sql = "INSERT INTO products (PRODUCT_NAME, PRODUCT_DESCRIPTION, PRICE) VALUES ('$name', '$desc', '$price')";
        
        if(mysqli_query($database, $sql))
        {
            
            mysqli_close($database);
            return true;
        }
        mysqli_close($database);
        return FALSE;
    }
    
    function findByID($productID)
    {
        $database = dbConnection();
        $sqlSTR = "SELECT * FROM products WHERE ID = " . $productID;
        $result = mysqli_query($database, $sqlSTR);
        if(mysqli_num_rows($result) == 0)
        {
            $result->free();
            mysli_close($database);
        }
        elseif(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            $product = new Product($row["ID"], $row["PRODUCT_NAME"], $row["PRODUCT_DESCRIPTION"], $row["PRICE"]);
            $result->free();
            mysqli_close($database);
            return $product;
        }
        return null;
    }
    
    function findByTerm($term)
    {
        $database = dbConnection();
        $sql = "SELECT * FROM products WHERE PRODUCT_NAME LIKE " . "'%" . $term . "%'";
        $result = mysqli_query($database, $sql);
        
        $index = 0;
        $products = array();
        while($row = $result->fetch_assoc())
        {
            $products[$index] = array($row["ID"], $row["PRODUCT_NAME"], $row["PRODUCT_DESCRIPTION"],
                $row["PRICE"]);
            ++$index;
        }
        return $products;
    }
    
    function updateProduct($product)
    {
        $database = dbConnection();
        
        $query = $database->prepare("UPDATE products SET PRODUCT_NAME=?, PRODUCT_DESCRIPTION=?, PRICE=?
            WHERE ID=?");
        $query->bind_param('ssdi', $product->getName(), $product->getDescription(), $product->getPrice(), $product->getID());
        $query->execute();
        if($query)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function deleteProduct($ID)
    {
        $database = dbConnection();
        
        $query = "DELETE FROM products WHERE ID = " . $ID;
        
        if($database->query($query) === TRUE)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function addItemToCart($ID, $QTY)
    {
        $database = dbConnection();
        $userID = getUserID();
                
        echo "User ID: " . $userID;
        $sql = "INSERT INTO cart (USER_ID, PROD_ID, QUANTITY) VALUES ('$userID', '$ID', '$QTY')";
        
        if(mysqli_query($database, $sql))
        {
            echo "Success!";
            mysqli_close($database);
            return true;
        }
        mysqli_close($database);
    }
    
    function updateQuantityInCart($ID, $QTY)
    {
        $database = dbConnection();
        
        $query = $database->prepare("UPDATE cart SET QUANTITY=? WHERE USER_ID=? AND PROD_ID=?");
        $query->bind_param('iii', $QTY, getUserID(), $ID);
        $query->execute();
        if($query)
        {
            return true;    
        }
        else
        {
            return false;
        }
    }
    
    function removeItemFromCart($ID)
    {
        $database = dbConnection();
        
        $query = "DELETE FROM cart WHERE USER_ID = " . getUserID() . " AND PROD_ID = " . $ID;
        
        if($database->query($query) === TRUE)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function retrieveCart()
    {
        $database = dbConnection();
        
        $query = "SELECT * FROM cart WHERE USER_ID = " . getUserID();
        $result = mysqli_query($database, $query);
        
        $userid = getUserID();
        $cart = new Cart(getUserID());
        
        while($row = $result->fetch_assoc())
        {
            $cart->updateQty($row['PROD_ID'], $row['QUANTITY']);
        }
        
        session_start();
        $_SESSION['cart'] = $cart;
        
        $result->free();
        mysqli_close($database);
        return true;
    }
}

?>