<?php include('partials-front/menu.php'); ?>




  <!-- php coding starts here -->
  <?php
                $login = false;
                $showError = false;
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

           

            $username = $_POST["username"];
            $password = $_POST["password"];

            
            
              // $sql10 = "Select * from `tbl_users` where `username`='$username' AND `password`='$password'";
              $sql10 = "Select * from `tbl_users` where `username`='$username'";
               $result = mysqli_query($conn, $sql10);
               $num = mysqli_num_rows($result);           

               if($num==1)
                   {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if(password_verify($password, $row['password']))
                        {
                                      $login = true;
                                      // session_start();              // session is alrealy started
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['username'] = $username;
                                   // header('location:'.SITEURL.'shoe-order/index.php');
                                   ?>
                                   <script>
                              window.location.href='index.php';      //  redirect is not happening by php thus we used javascript
                                 </script>
                              <?php
                        }
                        else
               {
               $showError = "Invalid credentials.";
        
               }
                       

                    }
                 
                 
                 }      
               else
               {
               $showError = "Invalid credentials.";
        
               }





        }
       

    ?>
<!-- php coding end here -->


















<!-- ths is alert from bootstrap  -->
<?php
if($login){
echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
';
}


if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> '. $showError.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
    ';
    }



?>


 <!-- content start here -->
 <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-5"  style="margin-top:90px;   margin-bottom:20px;">
                <h1>Login up to our website</h1>
            </div>
        </div>




        <div class="row justify-content-evenly" style="margin-top:50px;   margin-bottom:50px;">
                      <!-- sign up process starts here -->

            <form action="" method="post">
                <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" class="form-control" name ="username" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                     <input type="password" class="form-control" name="password" id="password">
                </div>
               
                     <button type="submit" class="btn btn-primary">Login</button>
            </form>

                 <!-- signup process end here -->














                      
    
    
    
         </div>








       




       







































    </div>       <!-- this is of container-->

<?php include('partials-front/footer.php'); ?>





























































