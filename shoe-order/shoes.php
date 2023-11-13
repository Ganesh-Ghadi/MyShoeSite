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
            <div class="button-alignment" style="display:flex; justify-content:center; align-item:center;">
            <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $id; ?>" class="btn btn-primary" style="margin-right:5px;">Buy Now</a>
            <!-- add to card form -->
            <form action="" method="post">
            <input type="hidden" name="title" value="<?php echo $title;  ?>">
            <input type="hidden" name="price" value="<?php echo $price;  ?>">
            <input type="hidden" name="description" value="<?php echo $description;  ?>">
            <input type="hidden" name="id" value="<?php echo $id;  ?>">
            <input type="hidden" name="image_name" value="<?php echo $image_name;  ?>">



            <input type="submit" value="Add to cart" name="submit3" class="btn btn-success"style=""> 
            </form>
                      </div>
            <!-- add to cart form complete -->
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

<!-- add form details in database -->
<?php

//check whether submit button clicked or not
if(isset($_POST['submit3']))
{
 //get all the details from the form
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $shoe_id = $_POST['id'];
  $image_name = $_POST['image_name'];
  


 // save the order in database
 //create sql to save the data
 $sql100 = "INSERT INTO tbl_cart SET
       title = '$title',
       description = '$description',
       price = $price,
       image_name = '$image_name',
       shoe_id = $shoe_id
       ";

    //echo $sql2; die();

   //execute the qurry
   $res100 = mysqli_query($conn, $sql100);

   //check whether query executed successfully or not
   if($res100==true)
   {
     // query executed and order saved
     $_SESSION['cart'] =  ' <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> shoes added in cart
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div> 
   ';
   ?>
   <script>
   window.location.href='index.php';      //  redirect is not happening by php thus we used javascript
   </script>
   <?php

   }
   else
   {
     //failed to save order
     $_SESSION['cart'] = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Failed!</strong> failed to add shoes in cart.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div> 
   ';
   ?>
        <script>
        window.location.href='index.php';      //  redirect is not happening by php thus we used javascript
        </script>
        <?php
    

   }




}









?>



              <!-- add form details in database complete -->

              
          </div>

















</div>       <!--this is for container-->
  

<?php include('partials-front/footer.php');  ?>