<?php include('partials-front/menu.php'); ?>




  <!-- php coding starts here -->
  <?php
                $showAlert = false;
                $showError = false;
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

           

            $username = $_POST["username"];
            $password = $_POST["password"];
            $cpassword =$_POST["cpassword"];
          //  $exists= false;
            //check whether this username exist
            $existSql = "SELECT * FROM `tbl_users` WHERE username = '$username'";
            $result =  mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows >0)
            {
              //  $exists = true;
                $showError = "user already exists";
            }
            else{
              //  $exists = false;
            
            if(($password == $cpassword))
            {
                 $hash = password_hash($password, PASSWORD_DEFAULT);
               $sql10 = "INSERT INTO `tbl_users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
               $result = mysqli_query($conn, $sql10);
               if($result){
                $showAlert = true;
               }
            }
            else
            {
                $showError = "passwords do not match or user already exists";

            }
        }
        }
       

    ?>
<!-- php coding end here -->


















<!-- ths is alert from bootstrap  -->
<?php
if($showAlert){
echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created and you can login.
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
            <div class="col-md-4"  style="margin-top:90px;   margin-bottom:20px;">
                <h1>Sign up to our website</h1>
            </div>
        </div>




        <div class="row justify-content-evenly" style="margin-top:50px;   margin-bottom:50px;">
                      <!-- sign up process starts here -->

            <form action="" method="post">
                <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" maxlength="11" class="form-control" name ="username" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                     <input type="password" maxlength="23" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                     <input type="password" class="form-control" name="cpassword" id="cpassword">
                     <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
                </div>
               
                     <button type="submit" class="btn btn-primary">Signup</button>
            </form>

                 <!-- signup process end here -->














                      
    
    
    
         </div>








       




       







































    </div>       <!-- this is of container-->

<?php include('partials-front/footer.php'); ?>





























































