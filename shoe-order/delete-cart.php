<?php include('partials-front/menu.php');  ?>

<?php
//echo "delete shoes page";
 // include constants file
 //include('../config/constants.php');


 //AND isset($_GET['image_name'])
 //echo "delete page";
 //check whether the id and image_name is set or not
 if(isset($_GET['id']) )
 {
 
 //get the value and delete
 //echo "get value and delete";
    
 $id = $_GET['id'];
 $image_name = $_GET['image_name'];
 
 //remove the physical image file if available
 /*if($image_name != "")              //cause we r not saving images in a folder like category and shoes
 {
     //image is available so remove it
     $path = "../images/shoes/".$image_name;
     //remove the image
     $remove = unlink($path);
 
     //if failed to remove image add an error message and stop the process
     if($remove==false)
     {
        // set the session message
        $_SESSION['remove-shoe'] = "<div class='text-danger'>failed to remove shoes image</div>";   // i have not named it 'upload'
       // redirect to manage category page
      // header('location:'.SITEURL.'admin/manage-shoes.php');
      ?>
    <script>
   window.location.href='cart.php';      //  redirect is not happening by php thus we used javascript
  </script>
  <?php
       //stop the process
       die();
 
 
     }
 
 
 
 }*/
 
 
 //delete data shhoe  from database
 //sql query to delete data from database
 $sql = "DELETE FROM tbl_cart WHERE id=$id";
 
 //execute the query
 $res = mysqli_query($conn, $sql);
 
 //check whether the data is deleted from database or not
 if($res==true)
 {
     //set success message and redirect
     $_SESSION['delete-cart'] = "<div class='text-success'>Shoes removed successfully</div>";
     //redirect to manage shoes
     //header('location:'.SITEURL.'admin/manage-shoes.php');
     ?>
     <script>
    window.location.href='cart.php';      //  redirect is not happening by php thus we used javascript
   </script>
   <?php
 
 }
 else
 {
     //set fail message and redirect 
     $_SESSION['delete-cart'] = "<div class='text-danger'>Failed to remove shoes from database</div>";
     //redirect to manage shoes
   //  header('location:'.SITEURL.'admin/manage-shoes.php');
   ?>
   <script>
  window.location.href='cart.php';      //  redirect is not happening by php thus we used javascript
 </script>
 <?php
 
 }
 
 
 
 
 
 
 
 }
 else
 {
    $_SESSION['unauthorize1'] = "<div class='text-danger'>Unauthorize access.</div>";
     //redirect to manage shoes  page
    // header('location:'.SITEURL.'admin/manage-shoes.php');
    ?>
    <script>
   window.location.href='cart.php';      //  redirect is not happening by php thus we used javascript
  </script>
  <?php
 }
  
?>