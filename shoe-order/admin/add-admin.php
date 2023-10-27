<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->

<!-- content start -->
<div class="container-fluid" style="background-color: #eeeff1;">
    <div class="row justify-content-evenly">
        <div class="col-10" style="margin-top:20px; margin-bottom:30px;">
            <h1>Add Admin</h1>

            <?php
                if(isset($_SESSION['add']))  // checking whether the session is set or not
                {
                    echo $_SESSION['add'];   // displaying the sesion message if set
                    unset($_SESSION['add']); //removing session message
                }
            ?>
        </div>
    </div>

    <div class="row justify-content-evenly">
            <div class="col-md-11">




                <!-- form control -->
              <form action="" method="POST">
                <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-5">
      <input type="text" name="full_name"  class="form-control" id="name">
    </div>
  </div>




  <div class="mb-3 row">
  <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-5">
      <input type="text" name="username"  class="form-control" id="username">
    </div>
  </div>







  <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
  </div>



<!-- add admin button -->
<button type="submit" name="submit" value="Add Admin" class="btn btn-success" style="margin-bottom:20px;" >Add Admin</button>

</form>          <!--form ends-->






            </div>
        </div>










</div>      <!-- of container-->
                 <!-- footer may be come here -->



<?php
 // process the value from form and save it in database
// check whether submit button clicked or not
if(isset($_POST['submit']))
{
    //button clicked
  //  echo "button clicked";


    //1.get data from form database
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);     // password encryption with md5

   //2. sql quary to save data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name = '$full_name',                                     
    username = '$username',
    password = '$password'
    ";     

    
     //3. executing query and saving data into database.
     $res = mysqli_query($conn, $sql) or die(mysqli_error());

     //4. check whether the data is inserted (query is executed) or not and display appropriate message
     if($res==TRUE)
     {
        //data inserted
        //echo "data inserted";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='text-success'>Admin Added Successfully</div>";       // here might be an issue
        //redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
     }
     else{
        //data not inserted
        //echo " data not inserted";
          //create a session variable to display message
        $_SESSION['add'] = "<div class='text-danger'>failed to add admin</div>";                  // here too issue
        //redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
     }

}

?>
<?php include('partials/footer.php'); ?>                      <!-- this is for footer (it might be neeed to placed up-->   