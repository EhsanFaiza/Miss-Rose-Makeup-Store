<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miss Rose Makeup Store</title>
    <!--bootstrap CSS link--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
     crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>
    /* Set the navbar background color */
    .navbar {
      background-color: white;
    }

    /* Style the navbar links */
    .navbar-nav .nav-link {
      color: fuchsia !important; /* Fuchsia color for text */
    }

    /* Hover effect for links */
    .navbar-nav .nav-link:hover {
      color:rgb(190, 11, 101) !important; /* Darker fuchsia on hover */
    }

    /* Add space between logo and menu items */
    .navbar-nav {
      margin-left: 200px; /* Adjust this value to leave more space for the logo */
    }

    /* Ensure the navbar brand image stays aligned */
    .navbar-brand img {
      width: 200px;
      height: 100px;
    }
    /* Change color of links in the secondary navbar */
  .navbar-dark .nav-link {
    color: white !important; /* White color for "Login" and "Welcome Guest" */
  }

  .navbar-dark .nav-link:hover {
    color: #ccc !important; /* Light gray on hover */
  }
  html {
    scroll-behavior: smooth;
}
  </style>
  </head>
  <body>
        <!--navbar-->
        <div class="container-fluid p-0">
            <!--first child-->
            
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href=".\images\Logo.JPG">
        <img src=".\images\Logo.JPG" alt="Brand Logo" width="100" height="100" class="logo">
      </a>
      
      <!-- Navbar Toggler for smaller screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar Menu Options -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li><a class="dropdown-item" href="face_products.php">Face</a></li>
                                <li><a class="dropdown-item" href="eyes_products.php">Eyes</a></li>
                                <li><a class="dropdown-item" href="lips_products.php">Lips</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="brandsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Brands
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="brandsDropdown">
                                <li><a class="dropdown-item" href="miss_rose.php">Miss Rose</a></li>
                                <li><a class="dropdown-item" href="missrose_int.php">MissRose International</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#bestSeller">Best Sellers</a></li>
                        <li class="nav-item"><a class="nav-link" href="aboutUs.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactUs.php">Contact Us</a></li>
                    </ul>
        
        <!-- Search Bar -->
        <form class="d-flex ms-auto" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- Cart Icon, Login, and Register -->
        <div class="d-flex ms-3">
          <!-- Cart Icon -->
          <a href="cart.php" class="nav-link">
            <i class="fas fa-shopping-cart" style="font-size: 20px;"></i> <sup>1
          </a>
          <li class="nav-item"> <a href="checkout.php" class="nav-link"> CheckOut</a></li>
      
        </div>
      </div>
    </div>
  </nav>
  <!--second child-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="welcome.php">Welcome Guest </a>
          </li>
 <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Login.php">Login </a>
          </li>
    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="register_page.php">Register </a>
          </li>
  </ul>
  </nav>
  
  <script src="index.js"></script>
    <!--bootstrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>

  </body>
</html>