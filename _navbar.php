<?php 
require_once 'BusinessService/functions.php';
if(isset($_GET['logout']))
{
    logOut();
}
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a0cbd1">
  <div class="container-fluid">
<!--     <a class="navbar-brand" href="#">Navbar</a> -->
<!--     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> -->
<!--       <span class="navbar-toggler-icon"></span> -->
<!--     </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Views/homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Views/aboutPage.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Views/accountPage.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Views/login.html?logout=true">Logout</a>
        </li>
        <?php if(getUserRole() == 2)
        {
        echo "<li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Admin
          </a>
          
          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <li><a class='dropdown-item' href='../Views/newUser.php'>Add User</a></li>
            <li><a class='dropdown-item' href='../Views/userAdmin.php'>User Admin</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='../Views/newProduct.php'>Add Product</a></li>
            <li><a class='dropdown-item' href='../Views/productAdmin.php'>Product Admin</a></li>
          </ul>
        </li> 
        ";
        } ?>
<!--         <li class="nav-item"> -->
<!--           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
<!--         </li> -->
      </ul>
<!--       <form class="d-flex"> -->
<!--         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
<!--         <button class="btn btn-outline-success" type="submit">Search</button> -->
<!--       </form> -->
    </div>
  </div>
</nav>