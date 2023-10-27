<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->

     <!-- content -->
    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10" style="margin-top:20px;   margin-bottom:20px;">
                <h1>Manage Admin</h1>
                
                <?php
                  if(isset($_SESSION['add']))
                  {
                    echo $_SESSION['add'];  //displaying session message
                    unset($_SESSION['add']);   //removing session message
                  }

                  if(isset($_SESSION['delete']))
                  {
                     echo $_SESSION['delete'];
                     unset($_SESSION['delete']);
                  }

                  if(isset($_SESSION['update']))
                  {
                     echo $_SESSION['update'];
                     unset($_SESSION['update']);
                  }
                    
                  if(isset($_SESSION['user-not-found']))
                  {
                     echo $_SESSION['user-not-found'];
                     unset($_SESSION['user-not-found']);
                  }

                  if(isset($_SESSION['pwd-not-match']))
                  {
                     echo $_SESSION['pwd-not-match'];
                     unset($_SESSION['pwd-not-match']);
                  }

                  if(isset($_SESSION['change-pwd']))
                  {
                     echo $_SESSION['change-pwd'];
                     unset($_SESSION['change-pwd']);
                  }


                ?>


            </div>
        </div>

<!-- button add admin -->

       <div class="row justify-content-evenly">
        <div class="col-10">
        <a href="add-admin.php" class="btn btn-primary">Add Admin</a>
        </div>
       </div>

 <!-- table start -->
        <div class="row justify-content-evenly" >
            <div class="col-md-10" style="margin-top:20px; margin-bottom:30px;">
            <table class="table caption-top table-striped table-hover">
  
  <thead>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col">Full Name</th>
      <th scope="col">Username</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

  <?php
     //query to get all admin
     $sql = "SELECT * FROM tbl_admin";
     // execute the query
     $res = mysqli_query($conn, $sql);

     // check whether the query is executed or not
     if($res == TRUE)
     {
        //count rows to check whether we have data in database or not
        $count = mysqli_num_rows($res);  // function to get all rows in database

        $sn = 1;          //create a variable and assign the value
        //check the no. of rows

             if($count>0)
             {
                //we have data in database
                  while($rows = mysqli_fetch_assoc($res))
                  {
                    // using while loop to get all data from database
                    // and while loop will run as long as we have data in database

                      // get individual data
                      $id = $rows['id'];
                      $full_name = $rows['full_name'];
                      $username = $rows['username'];

                       // display the values in our table
                       ?>

                        
                        <tbody>
                           <tr>
                            <th scope="row"><?php echo $sn++; ?></th>
                           <td><?php echo $full_name; ?></td>
                             <td><?php echo $username; ?></td>
                           <td><a href="<?php echo SITEURL;  ?>admin/update-password.php?id=<?php echo $id ?>" class="btn btn-primary">Change Password</a>
                            <a href="<?php echo SITEURL;  ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn btn-success">Update Admin</a>
                              <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn btn-danger">Delete Admin</a>
                               </td>
                                </tr>



                       <?php


                  }



             }
             else
             {
                 // we do not have data in database
             }


     }
  
  ?>


 
  </tbody>
</table>
            </div>
        </div>
    </div>
<!-- content end -->

 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->