<?php 

include('../config/constants.php');    //constants folder
include('login-check.php');

?>                    




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shoe website admin homepage</title>

    <!-- css link -->
    <link rel="stylesheet" href="index.css">

    <!-- boottstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

     <!-- navbar(headder) start here -->
     <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #ff3636;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="../images/logo1.jpg" width="80px;" alt="logo of a shoe">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-shoes.php">Shoes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-order.php">Order</a>
        </li>
          </ul>
        </li>
        
      </ul>

      <form class="d-flex bg-success " role="search">
        <a href="logout.php" class="btn btn-outline-primary text-white">Logout</a>
</form>

    </div>
  </div>
</nav>
 <!-- navbar(header ends here) -->