<?php include('../config/constants.php'); ?>
<!doctype html>
<html lang="en">
  <head>
  <style>
body {background-color: powderblue   ! important;} 
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <!-- boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row justify-content-evenly">
            <div class="col-md-3" style="margin-top:50px;">


       
            <div class="card" style="width:25rem;">
  <img src="../images/pass.jpg" class="card-img-top"  alt="...">
  <div class="card-body">
    <h5 class="card-title">Login pass- admin admin</h5>
    
      <?php
          if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];  //displaying session message
            unset($_SESSION['login']);   //removing session message
          }

          if(isset($_SESSION['no-login-message']))
          {
            echo $_SESSION['no-login-message'];  //displaying session message
            unset($_SESSION['no-login-message']);   //removing session message
          }


        ?>

    <p class="card-text">
         

    <!-- login form  -->
    <form action="" method="POST">
    <div class="mb-3 row">
  <label class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-6">
      <input type="text" name="username"  class="form-control" id="username">
    </div>
  </div>




  <div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-6">
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
  </div>


      

        </p>
    <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
  
</form>
    <!-- login form ends -->
  </div>
</div>

    

            </div>
        </div>
    </div>







    <!-- javascript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>


<?php

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //process for login
    //1. get the data from login form.
     //$username = $_POST['username'];
     //$password = md5($_POST['password']);
     $username = mysqli_real_escape_string($conn, $_POST['username']);

     $row_password = md5($_POST['password']);
     $password = mysqli_real_escape_string($conn, $row_password);


     //2. sql to check whether user with the username and password exist or not
     $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

      
     
     //3.execute the query 
     $res = mysqli_query($conn, $sql);

     //4.count rows to check whethher the user exist or not
     $count = mysqli_num_rows($res);

     if($count==1)
     {
        //user available and login success
        $_SESSION['login'] = "<div class='text-success'>login successful</div>";
        $_SESSION['user'] = $username;   //to check whether the user is logged in or not and logout will unset it
        // redirect to home page dashboard
        header('location:'.SITEURL.'admin/');
     }
     else
     {
        // user not available and login failed
        $_SESSION['login'] = "<div class='text-danger'>Username or password did not matched</div>";
        // redirect to home page dashboard
        header('location:'.SITEURL.'admin/login.php');

     }


}




?>