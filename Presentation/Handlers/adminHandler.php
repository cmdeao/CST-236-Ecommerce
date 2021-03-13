<?php
use BusinessService\Model\Product;

require_once '../../BusinessService/Model/Product.php';

include '../../BusinessService/functions.php';

if(isset($_POST['edit']))
{
    $ID = trim($_POST['edit']);
    saveTempID($ID);
    header("Location: ../Views/editUser.php");
}

require_once '../../BusinessService/UserBusinessService.php';
require_once '../../BusinessService/Model/User.php';
require_once '../../BusinessService/ProductBusinessService.php';
require_once '../../BusinessService/Model/Product.php';

if(isset($_POST['update']))
{
    $fName = trim($_POST['firstname']);
    $lName = trim($_POST['lastname']);
    $email = trim($_POST['emailaddress']);
    $username = trim($_POST['username']);
    $password = trim($_POST["password"]);
    $role = trim($_POST['role']);
    $ID = trim($_POST['update']);
    $service = new UserBusinessService();
    $user = new User($fName, $lName, $email, $username, $password, $role);
    if($service->updateUser($user, $ID))
    {
        header("Location: ../Views/userAdmin.php");
    }
    else 
    {
        echo "SOMETHING WENT WRONG";    
    }
}

if(isset($_POST['ban']))
{
    $id = trim($_POST['ban']);
    $service = new UserBusinessService();
    if($service->banUserID($id))
    {
        header("Location: ../Views/userAdmin.php");    
    }
    else
    {
        echo "Failed to ban user from the application";    
    }
}

if(isset($_POST['unban']))
{
    $id = trim($_POST['unban']);
    $service = new UserBusinessService();
    if($service->unbanUserID($id))
    {
        header("Location: ../Views/userAdmin.php");
    }
    else 
    {
        echo "Failed to unban user from the application";
    }
}

if(isset($_POST['delete']))
{
    $id = trim($_POST['delete']);
    $service = new UserBusinessService();
    if($service->deleteUserID($id))
    {
        header("Location: ../Views/userAdmin.php");
    }
    else 
    {
        echo "Failed to delete user from the database.";
    }
}

if(isset($_POST['editProduct']))
{
    $id = trim($_POST['editProduct']);
    $service = new ProductBusinessService();
    $product = $service->searchByID($id);
    include '../Views/editProduct.php';
}

if(isset($_POST['confirmEdit']))
{
    $id = $_POST['productID'];
    $name = trim($_POST['productName']);
    $desc = trim($_POST['productDesc']);
    $price = trim($_POST['price']);
    
    $service = new ProductBusinessService();
    $updatedProduct = new Product($id, $name, $desc, $price);
    if($service->updateProduct($updatedProduct))
    {
        header("Location: ../Views/productAdmin.php");
    }
    else 
    {
        echo "Failed to update the product.";
    }
}

if(isset($_POST['deleteProduct']))
{
    $id = trim($_POST['deleteProduct']);
    $service = new ProductBusinessService();
    if($service->deleteProductID($id))
    {
        header("Location: ../Views/productAdmin.php");
    }
    else 
    {
        echo "Failed to delete the product.";
    }
}

?>