<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top:20px;   margin-bottom:20px;">
                <h1>Manage shoes</h1>

              <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['remove-shoe']))
                    {
                        echo $_SESSION['remove-shoe'];
                        unset($_SESSION['remove-shoe']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['no-category-found']))
                    {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['update-shoes']))
                    {
                        echo $_SESSION['update-shoes'];
                        unset($_SESSION['update-shoes']);
                    }

                    



               ?>


            </div>
        </div>


    <!-- button add admin -->

    <div class="row justify-content-evenly">
        <div class="col-10">
        <a href="<?php echo SITEURL; ?>admin/add-shoes.php" class="btn btn-primary">Add Shoes</a>
        </div>
       </div>


<!-- table start -->
        <div class="row justify-content-evenly" >
            <div class="col-md-10" style="margin-top:20px; margin-bottom:30px;">
            <div class="table-responsive">
            <table class="table caption-top table-striped table-hover">
<thead>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col">Tiitle</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

   <?php
       //query to get all shoes from database
     $sql = "SELECT * FROM tbl_shoes";

     //execute query
     $res = mysqli_query($conn, $sql);

     //count rows
     $count = mysqli_num_rows($res);


        //create serial number variable
        $sn=1;




     //check whether we have data in our  database or not
     if($count>0)
     {
        // we have shoes in database
        // get the shoes and display
        while($row=mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];



    ?>


        <tbody>
           <tr>
             <td scope="row"><?php echo $sn++; ?></td>
              <td><?php echo $title; ?></td>
                 <td>$<?php echo $price; ?></td>
                 <td>
                 <?php 

                        //echo $image_name;
                        //check whether the image is available or not
                        if($image_name!="")
                        {
                            // we have image
                        //display the image

                 ?>

                            <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" width="100px">

                        
                <?php


                        }
                        else
                        {
                        // display the message that image not added
                        echo "<div class='text-danger'>Image not added</div>";
                        }



                 ?>



                 </td>
                 <td><?php echo $featured;  ?></td>
                 <td><?php echo $active;  ?></td>
                 <td><a href="<?php echo SITEURL; ?>/admin/update-shoes.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-success">Update Shoes</a>
                <a href="<?php echo SITEURL; ?>/admin/delete-shoes.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Shoes</a>
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
            <td><div class="text-danger">No shoes added.</div></td>
        </tr>


      <?php



     }





    ?>



      </table>
    </div>
            </div>
        </div>






















    </div>        <!--this is of container-->


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->