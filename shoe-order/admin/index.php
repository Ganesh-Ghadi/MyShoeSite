<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid "  style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top: 20px; margin-bottom:20px;">          <!-- col is 10-->
                <h1>Dashboard</h1>                        <!---title-->



                <?php
          if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];  //displaying session message
            unset($_SESSION['login']);   //removing session message
          }


        ?>




            </div>
        </div>
          
        <!-- content -->
        <div class="row justify-content-evenly">
            <div class="col-md-2 text-center" style="background-color: white;  margin-top: 20px; margin-bottom:60px;">

                <?php
                   //sql query
                   $sql = "SELECT * FROM tbl_category";
                   //execute query
                   $res = mysqli_query($conn, $sql);
                   //count rows
                   $count = mysqli_num_rows($res);


                ?>

                <h1><?php echo $count; ?></h1>
                <h5>Categories</h5>
            </div>
            <div class="col-md-2 text-center"  style="background-color: white; margin-top: 20px; margin-bottom:60px;">

            <?php
                   //sql query
                   $sql2 = "SELECT * FROM tbl_shoes";
                   //execute query
                   $res2 = mysqli_query($conn, $sql2);
                   //count rows
                   $count2 = mysqli_num_rows($res2);


                ?>



            <h1><?php echo $count2; ?></h1>
                <h5>Shoes</h5>
            </div>
            <div class="col-md-2 text-center"  style="background-color: white; margin-top: 20px; margin-bottom:60px;">


            <?php
                   //sql query
                   $sql3 = "SELECT * FROM tbl_order";
                   //execute query
                   $res3 = mysqli_query($conn, $sql3);
                   //count rows
                   $count3 = mysqli_num_rows($res3);


                ?>





            <h1><?php echo $count3; ?></h1>
                <h5>Total Orderes</h5>
            </div>
            <div class="col-md-2 text-center"  style="background-color: white; margin-top: 20px; margin-bottom:60px;">


              <?php
               
               //create sql query to get total revenuw generated
               //aggregate function in sql
               $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

               //execute the query
               $res4 = mysqli_query($conn, $sql4);

               //get the value
               $row4 = mysqli_fetch_assoc($res4);

               //get the total revenue
               $total_revenue = $row4['Total'];
 


               ?>







            <h1><?php  if($total_revenue==0){echo "0";}     ?><?php echo $total_revenue; ?></h1>
                <h5>Revenue Generated</h5>
            </div>
        </div>



    </div>


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->