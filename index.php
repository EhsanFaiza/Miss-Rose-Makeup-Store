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
  .side-navbar {
            flex: 1;
            border: none;
            border-radius: 8px;
            padding: 10px;
            height: fit-content;
            margin-left: 20px;
        }

        .side-navbar ul {
            list-style-type: none;
            padding: 0;
        }

        .side-navbar ul li {
            margin: 10px 0;
        }

        .side-navbar ul li a {
            text-decoration: none;
            color:rgba(192, 20, 71, 0.81);
        }

        .side-navbar ul li a:hover {
            text-decoration: underline;
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
      <a class="navbar-brand" href="index.php">
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
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name= "search_data">
           <input type= "submit" value= "Search" class = "btn btn-outline-dark" name= "search_data_product" >
        </form>

        <!-- Cart Icon, Login, and Register -->
        <div class="d-flex ms-3">
          <!-- Cart Icon -->
          <a href=".\cart.php" class="nav-link">
            <i class="fas fa-shopping-cart" style="font-size: 20px;"></i><span class= "badge badge-danger"> 1 </span>
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
        
  <!--third child-->
  <div class="bg-light"> 
    <h3 class = "text-center"> Get the Right Shade for Your Skin! </h3>   
    
  </div>
  <!--fourth child-->
  <div class="row">
  <div class="col-12">
    <!-- Banner Image -->
    <img src="./images/Img1.JPG" class="img-fluid" alt="Banner Image" style="width: 100%; height: auto;">
  </div>
</div>
      
  <!--fifth child-->

  <div id= "bestSeller" class="bg-light"> 
    <h3 class = "text-center"> BEST SELLERS </h3>   
    
  </div>

  <!--sixth child-->
  <div class="container my-4">
  <div class="row">
    
   


    <div class = "col-md-12"> <div class= "row"> 
      <!-- Card 1 -->
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\MissRoseSilkFlawlessFoundationdescription.webp" class="card-img-top" alt="Silk Foundation">
        <div class="card-body">
          <h5 class="card-title">MissRose Silk Flawless Foundation</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card">
    <div class="image-container">
        <img src=".\images\MissRoseLipTint_2.webp" class="card-img-top" alt="Product 1">
    </div>
    <div class="card-body">
        <h5 class="card-title">MissRose Lip Tint</h5>
        <button class="btn btn-primary">Add to Cart</button>
    </div>
</div>

    </div>

    
    <!-- Card 3 -->
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\MISS-ROSE-Face-Primer-Foundation-Liquid-Lotion-Repair-Nourish-Oil-Control-Liquid-Foundation-25ml-Nude-Make-1.webp" class="card-img-top" alt="Liquid Foundation">
        <div class="card-body">
          <h5 class="card-title">MissRose Primer Foundation Liquid Lotion</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>

     <!-- Card 4 -->
     <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\Miss-Rose-24h-hydrating-concealercolors.webp" class="card-img-top" alt="Hydrating Concealer">
        <div class="card-body">
          <h5 class="card-title">MissRose 24h hydrating concealer colors</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>


     <!-- Card 5 -->
     <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\MISS-ROSE-3D-Fiber-Mascara-Make-up-Waterproof-Long-Lasting-eye-lashes-Extension-eyes-cosmetics-TSLM2-1_1024x1024_2x_925f8da8-5945-4799-9e87-4b0e6a3983fe.webp" class="card-img-top" alt="Mascara">
        <div class="card-body">
          <h5 class="card-title">MissRose Curling and Lengthening Mascara</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>

     <!-- Card 6 -->
     <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\Full-Cover-6-Colors-Liquid-Concealer-Makeup-Face-Contour-Eye-Dark-Circles-Cream-Face-Corrector-Waterproof.webp" class="card-img-top" alt="Full Coverage Concealer">
        <div class="card-body">
          <h5 class="card-title">Miss Rose Full Coverage Concealer</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>


     <!-- Card 7 -->
     <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\MissRoseHydraMatteLipGloss6shades.webp" class="card-img-top" alt="Lip Gloss">
        <div class="card-body">
          <h5 class="card-title">MissRose HydraMatte Lip Gloss, 6 shades</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>



     <!-- Card 8  -->
     <div class="col-md-3 col-sm-6 mb-4">
      <div class="card" style="width: 100%;">
        <img src=".\images\s-l300_1.jpg" class="card-img-top" alt="Lipstick plus Liner">
        <div class="card-body">
          <h5 class="card-title">MISS ROSE Lipsticks Plus Liner</h5>
          <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>

    </div> </div>
    


    </div>
    </div>

</div>


    <!--seventh child-->
   <div class="bg-light p-3 text-center">
    <p>Affordable 100% Original Miss Rose Makeup Products. Official Miss Rose Store in Pakistan
    </p>
  </div>

  

        </div>


  

  <!--last child-->
  <div class="bg-info p-3 text-center">
    <p>All rights resrved by Faiza</p>
  </div>
        </div>

    <script src="index.js"></script>
    <!--bootstrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>

  </body>
</html>