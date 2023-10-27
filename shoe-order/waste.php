
<!-- content of manage admin -->
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
                           <td><a href="#" class="btn btn-success">Update Admin</a>
                              <a href="#" class="btn btn-danger">Delete Admin</a>
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





 //1. Get the DAta from Form

Sid-s_POST['id'] Scurrent password (5 POST['current_password']) Snow password mis($_POST['now_password']) Sconfirm password (S_POST['confirm passord'])s

//2. Check whether the user with current ID and Current Password Exists or ot Segl "SELECT FROM tbl_admin WHERE 16-gid AND passurdo Sourrent_posmerd

//Execute the Query Bres mysqli_query(Sconn, Sogl);

if(Brosentrue)

//CHeck whether data is available or not Scount mysqli_num_rows(Bres);





<tr>
             <th scope="row">2</th>
              <td>prathamesh</td>
                 <td>pghadi</td>
                 <td><a href="" class="btn btn-success">Update Admin</a>
                <a href="" class="btn btn-danger">Delete Admin</a>
            </td>
           </tr>

           <tr>
             <th scope="row">3</th>
              <td>vijay</td>
                 <td>akshay</td>
                 <td><a href="" class="btn btn-success">Update Admin</a>
                <a href="" class="btn btn-danger">Delete Admin</a>
            </td>
           </tr>

           <tr>
             <th scope="row">4</th>
              <td>abhisheck</td>
                 <td>abhi</td>
                        <td><a href="" class="btn btn-success">Update Admin</a>
                        <a href="" class="btn btn-danger">Delete Admin</a>
                    </td>
                  </tr>
















































































































































<?php
                      //create the php code to display the categories from detabase
                          //1. create sql query to get all active categories from detabase
                          $sql = "SELECT * FROM tbl_categpry WHERE active='Yes'";
                          // executing the query
                          $res = mysqli_query($conn, $sql);
                          // count rows to check whether we have categories or not
                            //$count = mysqli_num_rows($res);                    //problem is here
                          
                          

                          //IF COUNT IS GREATER than 1 then we have categories else we dont
                          if($count>0)
                          {
                            // we have categories
                             while($row=mysqli_fetch_assoc($res))
                             {
                                //get the details of categories
                                $id = $row['id'];
                                $title = $row['title'];

                            ?>

                                <option value="<?php echo $id; ?>" ><?php echo $title;  ?></option>
      
                           <?php

                              }
 
                          }
                          else
                           {
                            // we dont have categories
                             ?>
                             <option value="0" >No categories found</option>
                              <?php
                           }

                          //2. display on dropdown
                      
                                   

                    ?>

                    




















































</div>       <!-- this is of container-->


<!-- javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>










</div>





</div>




























     














































<!-- logout.php -->

<?php include('partials-front/menu.php'); ?>


<!-- content start here -->
<div class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-12"  style="margin-top:90px;   margin-bottom:20px;">
                <h1>logout</h1>
            </div>
        </div>




        <div class="row justify-content-evenly">






            <!-- logout process might be different -->












                      
    
    
    
         </div>















</div>       <!-- this is of container-->

<?php include('partials-front/footer.php'); ?>






































<!-- this is an important code for constran u will need it when buying -->
<!-- codeWH this is login code -->
<!-- this code will redirect u to login page if u r not logged in -->
<?php
if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin']!=true)
{
  ?>
  <script>
 window.location.href='login.php';      //  redirect is not happening by php thus we used javascript
</script>
<?php
exit;
}


?> 


























      
      
      
      

