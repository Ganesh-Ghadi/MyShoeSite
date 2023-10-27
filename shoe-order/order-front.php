<?php include('partials-front/menu.php'); ?>

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











<?php
if(isset($_SESSION['update']))
{
  echo $_SESSION['update'];
  unset($_SESSION['update']);
}

?>








    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top:20px;   margin-bottom:20px;">
                <h1>Your order</h1>
            </div>
        </div>


   


<!-- table start -->
        <div class="row justify-content-evenly" >
            <div class="col-md-10" style="margin-top:20px; margin-bottom:30px;">
            <table class="table caption-top table-striped table-hover">
<thead>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col">Shoes</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Order Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>



  <?php

   //get all the orders from the database    WHERE customer_name = 'pratik'
   $sql = "SELECT * FROM tbl_order ORDER BY id DESC";   //display latest order firrst.
   //execute query
   $res = mysqli_query($conn, $sql);
   //count the rows
   $count = mysqli_num_rows($res);

   $sn = 1;  //create a serial number and set its initial value as 1.

   if($count>0)
   {
    //order available 
    while($row=mysqli_fetch_assoc($res))
    {
        //get all order details
        $id = $row['id'];
        $shoes = $row['shoes'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
       


        
        ?>

             <tbody>
           <tr>
             <th scope="row"><?php  echo $sn++;  ?></th>
                 <td><?php  echo $shoes;  ?></td>
                 <td><?php  echo $price;  ?></td>
                 <td><?php  echo $quantity;  ?></td>
                 <td><?php  echo $total;  ?></td>
                 <td><?php  echo $order_date;  ?></td>
                 <td><?php  echo $status;  ?></td>
                 

                
           </tr>

         </tbody>




        <?php
        






    }
     
   }
   else
   {
    //order not available
    echo "<tr><td colspan='12' class='text-danger'>Orders not available.</td></tr>";
   }





?>














 
            </table>
            </div>
        </div>






















    </div>        <!--this is of container-->


    <?php include('partials-front/footer.php');  ?>