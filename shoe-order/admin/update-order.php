<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10" style="margin-top:20px; margin-bottom:30px;">
                <h1>Update Order</h1>




                  <?php
                     //check whether id is set or not
                     if(isset($_GET['id']))
                     {
                        //get the order details
                        $id = $_GET['id'];
                        //get all pther dertails based on id
                        //sql query to get other details
                        $sql = "SELECT * FROM tbl_order WHERE id=$id";
                        //execute query
                        $res = mysqli_query($conn, $sql);

                        //count rows
                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                            // details available
                            $row = mysqli_fetch_assoc($res);

                            $shoes = $row['shoes'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                        }
                        else
                        {
                            // detail not available 
                            // redirect to manage admin page 
                            ?>
                                   <script>
                              window.location.href='manage-order.php';      //  redirect is not happening by php thus we used javascript
                                 </script>
                              <?php
                        }
                        





                     }
                     else
                     {
                        //re3direct to manage order page
                        ?>
                                   <script>
                              window.location.href='manage-order.php';      //  redirect is not happening by php thus we used javascript
                                 </script>
                              <?php
                     }






                   ?>





















                    
                   <!-- form starts -->
                            <form action="" method="POST">

                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-5">
                            <h4><b><?php echo $shoes; ?></b></h4>
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-5">
                            <h4><b>$<?php echo $price; ?></b></h4>
                            </div>
                            </div>



                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-5">
                            <input type="number" name="quantity"  value="<?php echo $quantity; ?>"  class="form-control" id="username">
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-5">
                            <select  class="form-select" aria-label="Default select example" name="status">
                            <option <?php if($status=="Ordered"){echo "selected";}  ?>  value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";}  ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";}  ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";}  ?> value="Cancelled">Cancelled</option>
                            </select>
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-5">
                            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>"   class="form-control" id="username">
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Customer Contact</label>
                            <div class="col-sm-5">
                            <input type="number" name="customer_contact" value="<?php echo $customer_contact; ?>"  class="form-control" id="username">
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Customer Email</label>
                            <div class="col-sm-5">
                            <input type="email" name="customer_email" value="<?php echo $customer_email; ?>"   class="form-control" id="username">
                            </div>
                            </div>


                            <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Customer Address</label>
                            <div class="col-sm-5">
                            <textarea class="form-control"  id="exampleFormControlTextarea1" name="customer_address" rows="3" required><?php echo $customer_address; ?></textarea>
                            </div>
                            </div>


                             
                            <!-- hidden info -->
                            <input type="hidden" name="id" value="<?php echo $id;  ?>">
                            <input type="hidden" name="price" value="<?php echo $price;  ?>">

                            



                            <!-- add admin button -->
                           
                            <input type="submit" name="submit" value="Update Order" class="btn btn-success" style="margin-bottom:20px;" />



                            </form>








<?php

//check whether update button clicked or not
if(isset($_POST['submit']))
{
    //echo "clicked";
    //get all the values from form
    $id = $_POST['id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;

    $status = $_POST['status'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    
    //update the values
    $sql2 = "UPDATE tbl_order SET
    quantity = $quantity,
    total = $total,
    status = '$status',
    customer_name = '$customer_name',
    customer_contact = '$customer_contact',
    customer_email = '$customer_email',
    customer_address = '$customer_address'
    WHERE id = $id
    ";

    //execute the query
    $res2 = mysqli_query($conn, $sql2);

    //check whether update or not
    // and redirect to manage order with message 
    if($res2==true)
    {
        //updated
        $_SESSION['update'] = ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> order updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
      ';

      ?>
      <script>
 window.location.href='manage-order.php';      //  redirect is not happening by php thus we used javascript
    </script>
 <?php


    }
    else
    {
        // failed to update
        $_SESSION['update'] = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>failed to update order.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
      ';

             ?>
            <script>
            window.location.href='manage-order.php';      //  redirect is not happening by php thus we used javascript
             </script>
            <?php


    }







}





?>












































                            </div>
                </div>












                </div>    <!--this is of container-->
 <?php include('partials/footer.php'); ?>                      <!--this is for footer-->











 
