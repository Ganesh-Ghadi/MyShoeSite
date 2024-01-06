<?php include('config/constants.php');  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

      <!-- css file -->
      <link rel="stylesheet" href="demo.css">

    <!--bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- navbar -->
       <!-- login end here -->
          <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #ff3636;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img class="rounded" src="images/logo2.jpeg" width="80px;" alt="logo of a shoe">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo SITEURL; ?>">Home</a>
            </li>
             
            
             <!-- this is of login -->
             <li class="nav-item">
              <a class="nav-link" href="<?php echo SITEURL; ?>signup.php">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo SITEURL; ?>login.php">Login</a>
            </li>
            <!-- loogin end here -->
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo SITEURL; ?>men.php">Men</a></li>
                <li><a class="dropdown-item" href="<?php echo SITEURL; ?>women.php">Women</a></li>
                <li><a class="dropdown-item" href="<?php echo SITEURL; ?>kids.php">Kids</a></li>
              </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo SITEURL; ?>Contact-us.php">About us</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo SITEURL; ?>order-front.php">Order</a>
            </li>
              
               
              <!-- this is of logout -->
           <li class="nav-item">
              <a class="nav-link btn btn-success" href="<?php echo SITEURL; ?>logout.php">Log out</a>
            </li>

             
            <li class="nav-item">
              <a class="nav-link btn btn-warning" style=" margin-left:10px;" href="<?php echo SITEURL; ?>/admin/index.php">Admin Login</a>
            </li>

          </ul>
           <!-- logout end here -->
           
           






           <!-- cart start here -->
            <a class="" href="<?php echo SITEURL; ?>cart.php"> <li class="nav-item btn">
              
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart" viewBox="0 0 16 16">
                       <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
              </li> </a> 
           <!-- cart end here -->
          
          <form action="<?php echo SITEURL; ?>shoes-search.php" method="POST"   class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
            <input class="btn btn-outline-light" type="submit" value="Search" name="submit">
          </form>
        </div>
      </div>
    </nav> 
    
  
       


     <!-- Slider -->
     <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/slider_img5.png" class="d-block w-100" style="width: auto; height: 30rem;"  alt="..." >
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/slider_img31.jpg" class="d-block w-100" style="width: auto; height: 30rem;" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/slider_img29.jpg" class="d-block w-100" style="width: auto; height: 30rem;" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>