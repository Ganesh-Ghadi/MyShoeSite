<?php
//echo "delete shoes page";
 // include constants file
 include('../config/constants.php');



 //echo "delete page";
 //check whether the id and image_name is set or not
 if(isset($_GET['id']) AND isset($_GET['image_name']))
 {
 
 //get the value and delete
 //echo "get value and delete";
    
 $id = $_GET['id'];
 $image_name = $_GET['image_name'];
 
 //remove the physical image file if available
 if($image_name != "")
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
       header('location:'.SITEURL.'admin/manage-shoes.php');
       //stop the process
       die();
 
 
     }
 
 
 
 }
 
 
 //delete data shhoe  from database
 //sql query to delete data from database
 $sql = "DELETE FROM tbl_shoes WHERE id=$id";
 
 //execute the query
 $res = mysqli_query($conn, $sql);
 
 //check whether the data is deleted from database or not
 if($res==true)
 {
     //set success message and redirect
     $_SESSION['delete'] = "<div class='text-success'>Shoes deleted successfully</div>";
     //redirect to manage shoes
     header('location:'.SITEURL.'admin/manage-shoes.php');
 
 }
 else
 {
     //set fail message and redirect 
     $_SESSION['delete'] = "<div class='text-danger'>Failed to delete shoes from database</div>";
     //redirect to manage shoes
     header('location:'.SITEURL.'admin/manage-shoes.php');
 
 }
 
 
 
 
 
 
 
 }
 else
 {
    $_SESSION['unauthorize'] = "<div class='text-danger'>Unauthorize access.</div>";
     //redirect to manage shoes  page
     header('location:'.SITEURL.'admin/manage-shoes.php');
 }
  
?>