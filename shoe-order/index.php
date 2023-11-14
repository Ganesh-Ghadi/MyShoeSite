<?php  include('partials-front/menu.php'); ?>



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









<!-- ends here login code -->


<?php
if(isset($_SESSION['order']))
{
  echo $_SESSION['order'];
  unset($_SESSION['order']);
}

if(isset($_SESSION['cart']))
{
  echo $_SESSION['cart'];
  unset($_SESSION['cart']);
}

?>








 <!-- content start here -->
        


      <div class="container">
           <div class="row">
              <div class="col-md-12"  style="margin-top:50px;   margin-bottom:20px;">
                <h3 class="text-center">Welcome <?php echo $_SESSION['username'] ?></h3>
                <h1 class="text-center">Shoes For Men</h1>
              </div>
           </div>

        <div class="row justify-content-evenly">


     

       <?php
//create sql query to display shoes from database         category_id = 31 AND
$sql2 = "SELECT * FROM tbl_shoes WHERE category_id =30 AND  featured = 'Yes' AND active = 'Yes' LIMIT 8";
 // there is no sql1 
//execute the query 
$res2 = mysqli_query($conn, $sql2);

//count rows to check whether the category avaliable or not
$count2 = mysqli_num_rows($res2);



if($count2>0)
            {
              //Shoes available
               while($row = mysqli_fetch_assoc($res2))
               {
                //get the values like id title image name
                $id = $row['id'];          //we need to use this id
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];          // here might be a problem 
                $image_name = $row['image_name'];


                ?>


              <div class="col-lg-3">
           <!-- card -->
            <div class="card" style="width: auto; margin-bottom: 40px;">
               
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
            <div class="button-alignment" style="display:flex; justify-content:center;  align-items: center;">
            <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $id; ?>" class="btn btn-primary" style="margin-right:5px;">Buy Now</a>
                  <!-- add to card form -->
                  <form action="" method="post">
                  <input type="hidden" name="title" value="<?php echo $title;  ?>">
                  <input type="hidden" name="price" value="<?php echo $price;  ?>">
                  <input type="hidden" name="description" value="<?php echo $description;  ?>">
                  <input type="hidden" name="id" value="<?php echo $id;  ?>">
                  <input type="hidden" name="image_name" value="<?php echo $image_name;  ?>">


                      
                  <input type="submit" value="Add to cart" name="submit" class="btn btn-success"style=""> 
                      
            </form>
            </div>
            <!-- add to cart form complete -->

             













              </div>
           </div>
            </div>

                <!-- if you want to remove order process completltely then remove order page and remove the buy now button link -->
                 

                <?php


                

               }

            }
            else
            {
               //shoes not available
               echo "<div class='text-danger'>Shoes not available</div>";
            }






          ?>




 <!-- add form details in database -->
 <?php

//check whether submit button clicked or not
if(isset($_POST['submit']))
{
 //get all the details from the form
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $shoe_id = $_POST['id'];
  $image_name = $_POST['image_name'];
  


 // save the order in database
//  create sql to save the data
/*$sql100 = "INSERT INTO tbl_cart SET
       title = '$title',
       description = '$description',
       price = $price,
       image_name = '$image_name',
       shoe_id = $shoe_id
       ";*/
  
       $sql100 = "INSERT INTO `tbl_cart`(`title`, `description`, `price`, `image_name`, `shoe_id`) VALUES ('$title','$description','$price','$image_name','$shoe_id')";

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














<!--  Women shoes start here -->

<div class="row">
        <div class="col-md-12"  style="margin-top:50px;   margin-bottom:20px;">
            <h1 class="text-center">Shoes For Women</h1>
        </div>
    </div>

    <div class="row justify-content-evenly">


     

       <?php
//create sql query to display shoes from database
$sql3 = "SELECT * FROM tbl_shoes WHERE category_id =34 OR category_id = 35 AND featured = 'Yes' AND active = 'Yes' LIMIT 8";       
 // there is no sql1                                                                        need to check about featured and fdeatured
//execute the query 
$res3 = mysqli_query($conn, $sql3);

//count rows to check whether the category avaliable or not
$count3 = mysqli_num_rows($res3);



if($count3>0)
            {
              //Shoes available
               while($row = mysqli_fetch_assoc($res3))
               {
                //get the values like id title image name
                $id = $row['id'];          //we need to use this id
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];          // here might be a problem 
                $image_name = $row['image_name'];


                ?>


              <div class="col-lg-3">
           <!-- card -->
            <div class="card" style="width: auto; margin-bottom: 40px;">
               
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
            <div class="button-alignment" style="display:flex; justify-content:center; align-item:center">
            <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $id; ?>" class="btn btn-primary" style="margin-right:5px;">Buy Now</a>
          

              <!-- add to card form -->
            <form action="" method="post">
            <input type="hidden" name="title" value="<?php echo $title;  ?>">
            <input type="hidden" name="price" value="<?php echo $price;  ?>">
            <input type="hidden" name="description" value="<?php echo $description;  ?>">
            <input type="hidden" name="id" value="<?php echo $id;  ?>">
            <input type="hidden" name="image_name" value="<?php echo $image_name;  ?>">



             <input type="submit" value="Add to cart" name="submit2" class="btn btn-success"style="">
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
               echo "<div class='text-danger'>Shoes not available</div>";
            }






          ?>






<!-- add form details in database -->
<?php

//check whether submit button clicked or not
if(isset($_POST['submit2']))
{
 //get all the details from the form
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $shoe_id = $_POST['id'];
  $image_name = $_POST['image_name'];
  


 // save the order in database
 //create sql to save the data
 $sql101 = "INSERT INTO tbl_cart SET
       title = '$title',
       description = '$description',
       price = $price,
       image_name = '$image_name',
       shoe_id = $shoe_id
       ";

    //echo $sql2; die();

   //execute the qurry
   $res101 = mysqli_query($conn, $sql101);

   //check whether query executed successfully or not
   if($res101==true)
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





























<!--  Kids shoes start here -->

<div class="row">
        <div class="col-md-12"  style="margin-top:50px;   margin-bottom:20px;">
            <h1 class="text-center">Shoes For Kids</h1>
        </div>
    </div>

    <div class="row justify-content-evenly">


     

       <?php
//create sql query to display shoes from database
$sql4 = "SELECT * FROM tbl_shoes WHERE category_id =48 OR category_id = 49 OR category_id = 50 AND featured = 'Yes' AND active = 'Yes' LIMIT 8";
 // there is no sql1 
//execute the query 
$res4 = mysqli_query($conn, $sql4);

//count rows to check whether the category avaliable or not
$count4 = mysqli_num_rows($res4);



if($count4>0)
            {
              //Shoes available
               while($row = mysqli_fetch_assoc($res4))
               {
                //get the values like id title image name
                $id = $row['id'];          //we need to use this id
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];          // here might be a problem 
                $image_name = $row['image_name'];


                ?>


              <div class="col-lg-3">
           <!-- card -->
            <div class="card" style="width: auto; margin-bottom: 40px;">
               
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
               echo "<div class='text-danger'>Shoes not available</div>";
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
































</div>       <!-- this is of container-->

<?php include('partials-front/footer.php'); ?>