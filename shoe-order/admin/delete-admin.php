<?php

// include constants.php file here
include('../config/constants.php');



//1. get the id of admin to be deleted
 $id = $_GET['id'];


//2.Create sql quary to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";


//execute the query
$res = mysqli_query($conn, $sql);


// check whether the query executted successfully or not 
if($res==true)
{
    // query executed successfully and admin deleted
   // echo "admin deleted";
    // create session variable to display message
    $_SESSION['delete'] = "<div class='text-success'>Admin deleted successfully</div>";       // here might be an issue

    // redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');

}
else
{
    // failed to delete admin
    //echo "failed to delete admin";

    $_SESSION['delete'] = "<div class='text-danger'>Failed to delete admin. Try again Later.</div>";        // here issue too
    header('location:'.SITEURL.'admin/manage-admin.php');


}






//3. Redirect to manage admin page with message (success/error)




?>