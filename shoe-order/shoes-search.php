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
                //echo "<div class='text-danger'> shoes not found</div>";
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Sorry!</strong> Shoes not found
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div> 
                          ';
            }






          ?>



              
          </div>

















</div>       <!--this is for container-->
    




<?php include('partials-front/footer.php');  ?>