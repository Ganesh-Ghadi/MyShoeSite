<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10" style="margin-top:20px; margin-bottom:30px;">
                <h1>Change Password</h1>


             <?php

              if(isset($_GET['id']))
              {
                $id = $_GET['id'];
              }


              ?>






            </div>
        </div>

         

     <div class="row justify-content-evenly">
        <div class="col-md-11">

      <!-- form starts -->
      <form action="" method="POST">
          
      <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Current Password</label>
    <div class="col-sm-5">
      <input type="password" name="current_password" class="form-control" id="inputPassword">
    </div>
  </div>



  <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-5">
      <input type="password" name="new_password" class="form-control" id="inputPassword">
    </div>
  </div>


  <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-5">
      <input type="password" name="confirm_password" class="form-control" id="inputPassword">
    </div>
  </div>



  <!-- add admin button -->
  <input type="hidden" name="id" value="<?php echo $id; ?>">            <!-- imp-->
  <input type="submit" name="submit" value="Change Password" class="btn btn-success" style="margin-bottom:20px;" />



   </form>


        </div>
     </div>

<?php 
// check whether the submit button clicked or not
   if(isset($_POST['submit']))
   {
   // echo "clilcked";
   //1. get the data from form
   $id = $_POST['id'];
   $current_password = md5($_POST['current_password']);
   $new_password = md5($_POST['new_password']);
   $confirm_password = md5($_POST['confirm_password']);


   // check whether user with the current id and current password exist or not
   $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

   // execute the query
   $res = mysqli_query($conn, $sql);

   if($res==true)
   {
    // check whether the data is available or not
    $count = mysqli_num_rows($res);
      
    if($count==1)
    {
        // user exist and password can be changed
        //echo "user found";
          //check whether the new password and confirm password match or not
          if($new_password==$confirm_password)
          {
            // update the password
            $sql2 = "UPDATE tbl_admin SET
            password = '$new_password'
            WHERE id = $id
            ";

            //execute the query
            $res2 = mysqli_query($conn, $sql2);


            //check whether the query executed or not
            if($res2==true)
            {
                //display success message
                //redirect to manage admin page with success message
                $_SESSION['change-pwd'] = "<div class='text-success'>Password changed successfully</div>";
                // redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');

            }
            else
            {
                //display error message
                //redirect to manage admin page with error message
                $_SESSION['change-pwd'] = "<div class='text-danger'>Failed to change the password</div>";
                // redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');

            }



          }
          else
          {
            //redirect to manage admin page with error message
            $_SESSION['pwd-not-match'] = "<div class='text-danger'>Password did not match</div>";
            // redirect the user
            header('location:'.SITEURL.'admin/manage-admin.php');
          }



    }
    else
    {
        //user does not exist set meessage and redirect
        $_SESSION['user-not-found'] = "<div class='text-danger'>User not found</div>";
        // redirect the user
        header('location:'.SITEURL.'admin/manage-admin.php');
    }



   }



   }








?>



    </div>               <!-- this is of container-->
 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->