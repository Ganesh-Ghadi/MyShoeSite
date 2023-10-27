<?php include('partials-front/menu.php');  ?>



<?php
//check whether the shoes id is set or not
if(isset($_GET['shoe_id']))
{
    //get the shoe id and details of the selected shoes
    $shoe_id = $_GET['shoe_id'];

    //get the details of the selcted shhoes    here  query might be wrong its not shoe_id its id. in database.
    $sql = "SELECT * FROM tbl_shoes WHERE id=$shoe_id";
    //execute the query
    $res = mysqli_query($conn, $sql);
    //count the rows
    $count = mysqli_num_rows($res);
    //check whether the data is available or not
    if($count==1)
    {
        //we have data
        //get the dta from the dtabase
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];

    }
    else
    {
        ///food not available 
        //redirect to home page
        ?>
        <script>
        window.location.href='index.php';      //  redirect is not happening by php thus we used javascript
        </script>
        <?php

    }






}
else
{
    //redirect to homepage
    ?>
<script>
 window.location.href='index.php';      //  redirect is not happening by php thus we used javascript
</script>
<?php
}






?>


















<!-- content start here -->
        


<div class="container">
    <div class="row">
        <div class="col-md-12"  style="margin-top:50px;   margin-bottom:20px;">
           <h3 class="text-center">Welcome <?php echo $_SESSION['username'] ?></h3>
            <h1 class="text-center">Fill this form to confirm the order</h1>
        </div>
    </div>

    <div class="row justify-content-evenly"  style="margin-top:50px;   margin-bottom:50px;">




 <!-- this is where u will get food details -->
    <h4 class="text-center">Selected Shoes</h4>
                <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">


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
                              <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" class="img-fluid rounded-start" style="height: 15rem;">
                            <?php



                        }

                        
                         ?>




               
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $title;  ?></h4>
                   
                    <p class="card-text"><?php echo $description;  ?></p>
                   <h4> <p class="card-text">₹<?php echo $price; ?></p><h4>
                  
                    <h5>Quantity</h5>
                    <form action="" method="post" >           
                        <!-- this form desent belong here it belong in line no. 193 , delivery detail hya html name chya varchi 1 line sodun mag ha form tithe basav -->
                    <input type="number" class="form-control" name="quantity" value="1" id="email">
            </div>
            </div>
        </div>
        </div>
        </div>
 <!-- it will end here -->






 




































    <!-- this is the information form -->
    <div class="row g-0">
                <div class="mx-auto col-10 col-md-8 col-lg-6">
  
                <div class="mb-3">
                    <h3>Delivery details</h3>
                     <!-- this info is about the selected shoes that is made hidden -->
                     <input type="hidden" name="shoes" value="<?php echo $title;  ?>">
                    <input type="hidden" name="price" value="<?php echo $price;  ?>">
                    <!-- this hidden info will end here -->
                     <label for="username" class="form-label">full Name :</label>
                     <input type="text" class="form-control" name ="full-name" id="username" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="phone number" class="form-label">Phone Number :</label>
                     <input type="tel" class="form-control" name="contact" id="number" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                     <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" required></textarea>
                    </div>
                   
               
                     <input type="submit" value="Confirm Order" name="submit" class="btn btn-primary"style=" margin-bottom:50px;">
                    <!-- <a href="<?php echo SITEURL; ?>order-front.php?customer_name=<?php echo $customer_name; ?>" class="btn btn-primary">Buy Now</a>    -->
    </form>
</div>
</div>
   <!-- this form end here -->









   <?php

   //check whether submit button clicked or not
   if(isset($_POST['submit']))
   {
    //get all the details from the form
     $shoes = $_POST['shoes'];
     $price = $_POST['price'];
     $quantity = $_POST['quantity'];
     $total = $price * $quantity;   //total = price * qty          commentiing fro some time
     $order_date = date("Y-m-d h:i:sa"); //order date
     $status = "ordered";              //orderd , on delevery , deliverd, canclled
     $customer_name = mysqli_real_escape_string($conn, $_POST['full-name']);
     $customer_contact =mysqli_real_escape_string($conn,  $_POST['contact']);
     $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
     $customer_address = mysqli_real_escape_string($conn, $_POST['address']);


    // save the order in database
    //create sql to save the data
    $sql2 = "INSERT INTO tbl_order SET
          shoes = '$shoes',
          price = $price,
          quantity = $quantity,
          total = $total,
          order_date = '$order_date',
          status = '$status',
          customer_name = '$customer_name',
          customer_contact = '$customer_contact',
          customer_email = '$customer_email',
          customer_address = '$customer_address'
          ";

       //echo $sql2; die();

      //execute the qurry
      $res2 = mysqli_query($conn, $sql2);

      //check whether query executed successfully or not
      if($res2==true)
      {
        // query executed and order saved
        $_SESSION['order'] =  ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Shoes has been Ordered.
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
        $_SESSION['order'] = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> failed to order shoes.
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
















































    </div>



















</div>       <!-- this is of container-->


<?php include('partials-front/footer.php');  ?>