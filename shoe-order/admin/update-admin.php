<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10" style="margin-top:20px; margin-bottom:30px;">
                <h1>Update Admin</h1>


                 <?php
                    // 1.get the id of selected admin
                    $id = $_GET['id'];

                    //2. create sql query to get details.
                    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                    //execute the query
                    $res = mysqli_query($conn, $sql);
                      
                     //check whether the query is executed or not
                     if($res==true)
                     {
                        // check whether the data is available or not
                        $count = mysqli_num_rows($res);
                        //check whether we have admin data or not
                        if($count==1)
                        {
                               // get the details
                             //  echo "admin available";
                             $row = mysqli_fetch_assoc($res);

                             $full_name = $row['full_name'];
                             $username = $row['username'];
                        }
                        else
                        {
                            //redirect to manage admin page
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                     } 

                     ?>






            </div>
        </div>



     <div class="row justify-content-evenly">
        <div class="col-md-11">
            
               <!-- form starts -->
               <form action="" method="POST">

               <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-5">
      <input type="text" name="full_name" value="<?php echo $full_name;  ?>" class="form-control" id="name">
    </div>
  </div>




  <div class="mb-3 row">
  <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-5">
      <input type="text" name="username"  value="<?php echo $username;  ?>" class="form-control" id="username">
    </div>
  </div>



  <!-- add admin button -->
  <input type="hidden" name="id" value="<?php echo $id; ?>">            <!-- imp-->
<input type="submit" name="submit" value="Update Admin" class="btn btn-success" style="margin-bottom:20px;" />



            </form>

        </div>
     </div>

     <?php
// check whether the submit button clicked or not
if(isset($_POST['submit']))
{
    //echo "button clicked";
    //get all values from form to update
     $id = $_POST['id']; 
     $full_name = $_POST['full_name']; 
     $username = $_POST['username']; 

     // create an sql query to update admin
     $sql = "UPDATE tbl_admin SET
     full_name = '$full_name',
     username = '$username'
     WHERE id = '$id'
     ";

     //execute the query
     $res = mysqli_query($conn, $sql);

     // check whether the query executed successfully or not
     if($res==true)
     {
        // query executed and admin updated
        $_SESSION['update'] = "<div class='text-success'>Admin updated successfully</div>";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else
     {
        // failed to update admin
        $_SESSION['update'] = "<div class='text-danger'>Failed to update admin</div>";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');

     }






}



?>



    </div>    <!--this is of container-->
 <?php include('partials/footer.php'); ?>                      <!--this is for footer-->