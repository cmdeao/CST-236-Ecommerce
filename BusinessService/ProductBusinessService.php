<?php
require_once 'ProductDataService.php';
class ProductBusinessService
{
       function getAllProducts()
       {
           $service = new ProductDataService();
           return $service->findAllProducts();
       }
       
       function searchByID($productID)
       {
           $service = new ProductDataService();
           return $service->findByID($productID);
       }
       
       function searchByTerm($term)
       {
           $service = new ProductDataService();
           return $service->findByTerm($term);
       }
       
       function newProduct($product)
       {
           echo "<br>Inside Business";
           $service = new ProductDataService();
           return $service->makeNewProduct($product);
       }
       
       function updateProduct($product)
       {
           $service = new ProductDataService();
           return $service->updateProduct($product);
       }
       
       function deleteProductID($ID)
       {
           $service = new ProductDataService();
           return $service->deleteProduct($ID);
       }
}

?>