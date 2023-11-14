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
                <h1 class="text-center">Categories For Women</h1>
            </div>
        </div>




        <div class="row justify-content-evenly">



        <?php
            //create sql query to display categories from database
            $sql = "SELECT * FROM tbl_category WHERE category_name = 'Women' AND featured = 'Yes' AND active = 'Yes'";
             
            //execute the query 
            $res = mysqli_query($conn, $sql);
            
            //count rows to check whether the category avaliable or not
            $count = mysqli_num_rows($res);
            
            

            if($count>0)
            {
              //categories available
               while($row = mysqli_fetch_assoc($res))
               {
                //get the values like id title image name
                $id = $row['id'];          //we need to use this id
                $title = $row['title'];
                $image_name = $row['image_name'];


                ?>

                      <div class="card mb-3" style="max-width: 540px; margin-top: 60px;">
                     <div class="row g-0">
                     <div class="col-lg-6 align-self-center">
                      <?php
                      //check whether image is available or not
                        if($image_name=="")
                        {
                          //display message
                          echo "<div class='text-danger'>image not available</div>";
                        }
                        else
                        {
                          // image available
                            ?>
                              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-fluid rounded-start" style="height: 17rem; width:23rem;">
                            <?php



                        }

                        
                         ?>
                     </div>
                      <div class="col-md-6">        <!--changes needs for including anchoar tag-->
                       <div class="card-body">
                      <h2 class="card-title"><?php echo $title; ?></h2>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="<?php echo SITEURL; ?>shoes.php?category_id=<?php echo $id; ?>" class="btn btn-primary">See Shoes</a>
                       </div>
                      </div>
                      </div>
                      </div>

                 

                <?php


                

               }

            }
            else
            {
               //categories not available
               echo "<div class='text-danger'>Categories not available</div>";
            }






          ?>





             




             
              
          </div>

















</div>       <!--this is for container-->
  

<?php include('partials-front/footer.php');  ?>