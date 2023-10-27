<?php include('partials-front/menu.php');  ?>


    <?php
     // check whether the id is passed or not
     if(isset($_GET['category_id']))
     {
      //category id is set and get the id
      $category_id = $_GET['category_id'];
      //get the categoory titlel based on category id
      $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

      //execute the query
      $res = mysqli_query($conn, $sql);

      // get the value from database
      $row = mysqli_fetch_assoc($res);

      //get the title
      $category_title = $row['title'];

     }
     else
     {
        //category not passed 
        //redirect to home page
        header('location:'.SITEURL);
     }


    ?>


     
      <!-- content start here -->
 <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-12"  style="margin-top:90px;   margin-bottom:20px;">
                <h2>Shoes on <a href="#" class="btn btn-success">"<?php echo $category_title; ?>"</a></h2>
            </div>
        </div>




        <div class="row justify-content-evenly">

          <?php
          //create sql query to get shoes based on selected category
           
            $sql2 = "SELECT * FROM tbl_shoes WHERE category_id=$category_id";
             // we might make chaanges in the above sel query to show category then we have to make changes in displaying data as well
            //execute the query
            $res2 = mysqli_query($conn, $sql2);

            //count rows
            $count2 = mysqli_num_rows($res2);

            //check whether the shoes is available or not
            if($count2>0)
            {
                //shoes available
                while($row2 = mysqli_fetch_assoc($res2))
                {
                    //get the details 
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];

                    ?>
                        <div class="col-md-3">
           <!-- card -->
            <div class="card" style="width: 18rem; margin-bottom: 30px;">
               
            <?php
                      //check whether image is available or not
                        if($image_name=="")
                        {
                          //display message image not available
                          echo "<div class='text-danger'>image not available</div>";
                        }
                        else
                        {
                          // image available
                            ?>
                              <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" class="img-fluid rounded-start" style="height: 18rem;">
                            <?php



                        }

                        
                         ?>

    

             <div class="card-body">
            <h5 class="card-title"><?php echo $title; ?></h5>
            <h4 class="card-title">₹<?php echo $price; ?></h4>
            <p class="card-text"><?php echo $description; ?></p>
            <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $id; ?>" class="btn btn-primary">Buy Now</a>
              </div>
           </div>
            </div>


                     <?php




                }




            }
            else
            {
                //shoes not available
                echo "<div class='text-danger'> shoes not available</div>";
            }






          ?>



              
          </div>

















</div>       <!--this is for container-->
  

<?php include('partials-front/footer.php');  ?>