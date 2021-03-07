<?php
use BusinessService\Model\Product;

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
            $product = new Product($row["PRODUCT_NAME"], $row["PRODUCT_DESCRIPTION"], $row["PRICE"]);
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
}

?>