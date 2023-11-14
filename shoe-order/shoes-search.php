<?php include('partials-front/menu.php');  ?>

    
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










 <!-- content start here -->
 <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-md-12"  style="margin-top:90px;   margin-bottom:20px;">
               <?php
               //get the search keyword
                 // $search = $_POST['search'];
                 $search = mysqli_real_escape_string($conn, $_POST['search']);

               ?>

                <h2>Shoes on your search <a href="#" class="btn btn-success">"<?php echo $search; ?>"</a></h2>
            </div>
        </div>




        <div class="row justify-content-evenly">

          <?php
            //get the search keyword
           // we got it on the top

            //sql query to get shoes based on searched keyword
            $sql = "SELECT * FROM tbl_shoes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
             // we might make chaanges in the above sel query to show category then we have to make changes in displaying data as well
            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);

            //check whether the shoes is available or not
            if($count>0)
            {
                //shoes available
                while($row = mysqli_fetch_assoc($res))
                {
                    //get the details
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];

                    ?>
                        <div class="col-md-3 align-self-center">
           <!-- card -->
            <div class="card" style="width: auto; margin-bottom: 30px;">
               
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
                              <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" class="img-fluid rounded-start" style="height: 17rem; width:23rem;">
                            <?php



                        }

                        
                         ?>

    

             <div class="card-body">
            <h5 class="card-title"><?php echo $title; ?></h5>
            <h4 class="card-title">₹<?php echo $price; ?></h4>
            <p class="card-text"><?php echo $description; ?></p>
            <div class="button-alignment" style="display:flex; justify-content:center; align-item:center;">
            <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $id; ?>" class="btn btn-primary"  style="margin-right:5px;">Buy Now</a>
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
                //echo "<div class='text-danger'> shoes not found</div>";
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Sorry!</strong> Shoes not found
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div> 
                          ';
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