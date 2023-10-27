<?php include('partials/menu.php');?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top:20px;   margin-bottom:20px;">
                <h1>Manage Category</h1>



                <?php
                  
                  if(isset($_SESSION['add']))
                  {
                      echo $_SESSION['add'];
                      unset($_SESSION['add']);
                  }

                  if(isset($_SESSION['remove']))
                  {
                      echo $_SESSION['remove'];
                      unset($_SESSION['remove']);
                  }
                 
                  if(isset($_SESSION['delete']))
                  {
                      echo $_SESSION['delete'];
                      unset($_SESSION['delete']);
                  }

                  if(isset($_SESSION['no-category-found']))
                  {
                      echo $_SESSION['no-category-found'];
                      unset($_SESSION['no-category-found']);
                  }

                  if(isset($_SESSION['update-category']))
                  {
                      echo $_SESSION['update-category'];
                      unset($_SESSION['update-category']);
                  }

                  if(isset($_SESSION['upload']))
                  {
                      echo $_SESSION['upload'];
                      unset($_SESSION['upload']);
                  }

                  if(isset($_SESSION['failed-remove']))
                  {
                      echo $_SESSION['failed-remove'];
                      unset($_SESSION['failed-remove']);
                  }


  
  
                
                  ?>





            </div>
        </div>


    <!-- button add admin -->

    <div class="row justify-content-evenly">
        <div class="col-10">
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>
        </div>
       </div>


<!-- table start -->
        <div class="row justify-content-evenly" >
            <div class="col-md-10" style="margin-top:20px; margin-bottom:30px;">
            <table class="table caption-top table-striped table-hover">
<thead>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

   <?php
     //query to get all categories from database
     $sql = "SELECT * FROM tbl_category";

     //execute query
     $res = mysqli_query($conn, $sql);

     //count rows
     $count = mysqli_num_rows($res);


        //create serial number variable
        $sn=1;




     //check whether we have data in our  database or not
     if($count>0)
     {
        // we have data in database
        // get the data and display
        while($row=mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
            $category_name = $row['category_name'];


         ?>

         <tbody>
           <tr>
             <th scope="row"><?php echo $sn++; ?></th>
              <td><?php echo $title; ?></td>
                 <td>
                    <?php 

                       //echo $image_name;
                       //check whether the image is available or not
                       if($image_name!="")
                       {
                        //display the image

                         ?>

                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

                          
                          <?php


                       }
                       else
                       {
                        // display the message
                        echo "<div class='text-danger'>Image not added</div>";
                       }



                  ?>
                </td>
                 <td><?php echo $featured; ?></td>
                 <td><?php echo $active; ?></td>
                 <td><?php echo $category_name; ?></td>
                 <td><a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn btn-success">Update Category</a>       <!--problem is here-->
                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a>
            </td>
           </tr>

          

            </tbody>


        


        <?php
        }





     }
     else
     {
        //we do not have data
        //we will display message inside table
            ?>
           <tr>
            <td><div class="text-danger">No category added.</div></td>
           </tr>


            <?php



     }





   ?>



  
            </table>
            </div>
        </div>






















    </div>        <!--this is of container-->


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->