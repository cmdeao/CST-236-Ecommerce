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
}

?>