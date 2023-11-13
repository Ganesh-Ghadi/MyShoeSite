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







<div class="container " >
    <div class="row">
        <div class="col-md-12"  style="margin-top:50px;   margin-bottom:20px;">
           <h3 class="text-center">Welcome <?php echo $_SESSION['username'] ?></h3>
            <h1 class="text-center">Shopping Cart  
            <!-- shopping cart symbol -->
            <a class="" href=""> <li class="nav-item btn">
              
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-cart" viewBox="0 0 16 16">
                   <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
          </li> </a>
            </h1>
          <!-- shopping cart symbol -->
        </div>
    </div>

    <div class="row justify-content-evenly col-md-4"  style="margin-top:50px;   margin-bottom:50px;">


    <?php
if(isset($_SESSION['delete-cart']))
{
  echo $_SESSION['delete-cart'];
  unset($_SESSION['delete-cart']);
}

if(isset($_SESSION['unauthorize1']))
{
  echo $_SESSION['unauthorize1'];
  unset($_SESSION['unauthorize1']);
}

if(isset($_SESSION['remove-shoe']))
{
  echo $_SESSION['remove-shoe'];
  unset($_SESSION['remove-shoe']);
}

?>


















<?php

//get all the orders from the database
$sql = "SELECT * FROM tbl_cart ORDER BY id DESC";   //display latest order firrst.
//execute query
$res = mysqli_query($conn, $sql);
//count the rows
$count = mysqli_num_rows($res);

//$sn = 1;  //create a serial number and set its initial value as 1.

if($count>0)
{
 //order available 
 while($row=mysqli_fetch_assoc($res))
 {
     //get all order details
     $id = $row['id'];
     $title = $row['title'];
     $description = $row['description'];
     $price = $row['price'];
     $shoe_id = $row['shoe_id'];
     $image_name = $row['image_name'];
    


     
     ?>











   <!-- this is where u wull get shoes details  -->
   <div class="card mb-3 col-md-12" style=" max-width: 500px; max-height:500px;">
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
                              <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $image_name; ?>" class="img-fluid rounded-start" style="height:auto;">
                            <?php



                        }

                        
                         ?>




               
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $title;  ?></h4>
                   
                    <p class="card-text"><?php echo $description;  ?></p>
                   <h4> <p class="card-text">₹<?php echo $price; ?></p> <h4>
                  
                   
                    <a href="<?php echo SITEURL; ?>order.php?shoe_id=<?php echo $shoe_id; ?>" class="btn btn-primary">Buy Now</a>
                    <a href="<?php echo SITEURL; ?>delete-cart.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Remove</a>
                  
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


      
 <?php
        




                      

      }
       
     }
     else
     {
      //order not available
      echo "<tr><td colspan='12' class='text-danger'>shoes not available.</td></tr>";
     }
  
  
  
  
  
  ?>
  
      





    
















</div>















</div>                         <!-- this is of container -->
<?php include('partials-front/footer.php');  ?>