<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top:20px;   margin-bottom:20px;">
                <h1>Update Shoes</h1>

                  


                <?php
              
              //check whether the id is set or not
              if(isset($_GET['id']))
              {

                //get the id and all other details
                //  echo "getting the data";
                $id = $_GET['id'];
                // create sql query to get all other details
                $sql2 = "SELECT * FROM tbl_shoes WHERE id=$id";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                 //count the rows to check whether the id is valid or not
                 $count2 = mysqli_num_rows($res2);

                 if($count2==1)
                 {
                //get the value based on query executed
                $row2 = mysqli_fetch_assoc($res2);


                //get the individual value of shoes selected
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $current_image = $row2['image_name'];
                $current_category = $row2['category_id'];
                $featured = $row2['featured'];
                $active = $row2['active'];
                 }
                 else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='text-danger>cetegory not found</div>";
                    header('location:'.SITEURL.'admin/manage-shoes.php');
                }









              }
                else
              {
                //redirect to manage shoes
                header('location:'.SITEURL.'admin/manage-shoes.php');
              }


             ?>










            </div>
        </div>


    


<!-- table start -->
        <div class="row justify-content-evenly" >
            <div class="col-md-10" style="margin-top:20px; margin-bottom:30px;">
           

                <!-- form control -->
                 <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-5">
                    <input type="text" name="title"  class="form-control" id="title" value="<?php echo $title;  ?>">
                    </div>
                </div>


                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-5">
                <textarea name="description" ><?php echo $description;  ?></textarea>
                </div>
                </div>




                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-5">
                <input type="number"  class="form-control" name="price" value="<?php echo $price;  ?>" >
                </div>
                </div>



                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Current Image</label>
                <div class="col-sm-5">


                <?php
                 if($current_image != "")
                 {
                    //display the image
                    ?>
                      <img src="<?php echo SITEURL; ?>images/shoes/<?php echo $current_image; ?>" width="150px" >
                    <?php
                 }
                 else
                 {
                    //display message
                    echo "<div class='text-danger'>Image not added</div>";
                 }


               ?>


                    </div>
                    </div>



                    <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">New Image</label>
                <div class="col-sm-5">
                    <input type="file" name="image">
                    </div>
                    </div>


               
                    <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-5">
                    <select name="category" id="">
                       





                    <?php
                      //create the php code to display the categories from detabase
                          //1. create sql query to get all active categories from detabase
                          $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                          // executing the query
                          $res = mysqli_query($conn, $sql);
                          // count rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);                    //problem is here
                          
                          

                          //IF COUNT IS GREATER than 1 then we have categories else we dont
                          if($count>0)
                          {
                            // we have categories
                             while($row=mysqli_fetch_assoc($res))
                             {
                                //get the details of categories
                                $category_id = $row['id'];
                                $category_title = $row['title'];

                            ?>

                                <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>" ><?php echo $category_title;  ?></option>
      
                           <?php

                              }
 
                          }
                          else
                           {
                            // we dont have categories
                             ?>
                             <option value="0" >No categories found</option>
                              <?php
                           }

                          //2. display on dropdown
                      
                                   

                    ?>  















                    
                    </select>
                </div>
                    </div>


                    <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Featured</label>
               <div class="col-sm-5">
    <input  <?php if($featured=="Yes"){echo "checked";}  ?> type="radio" name="featured" value="Yes">Yes
        <input  <?php if($featured=="No"){echo "checked";}  ?> type="radio" name="featured" value="No">No
      </div>
      </div>




    <div class="mb-3 row">
     <label class="col-sm-2 col-form-label">Active</label>
          <div class="col-sm-5">
      <input <?php if($active=="Yes"){echo "checked";}  ?> type="radio" name="active" value="Yes">Yes
  <input <?php if($active=="No"){echo "checked";}  ?> type="radio" name="active" value="No">No
  </div>
  </div>

  <!-- add Update button -->
  <input type="hidden" name="id" value="<?php echo $id; ?>">     <!--problem might be here--> 
  <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
      <input type="submit" name="submit" value="Update Shoes" class="btn btn-success" style="margin-bottom:20px;" />

        </form>          <!--form ends-->






            </div>
        </div>




        

        <?php



if(isset($_POST['submit']))
{
    //echo "clicked";
    //1.get all the values from our form
   $id = $_POST['id']; 
   $title = $_POST['title'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $current_image = $_POST['current_image'];
   $category = $_POST['category'];
   $featured = $_POST['featured'];
   $active = $_POST['active'];
  

   // 2. updating new image if selected
     // check whether image is selected or not
     if(isset($_FILES['image']['name']))
     {
      //get the image details
      $image_name = $_FILES['image']['name'];

      //check whether the image is available or not
      if($image_name != "")
      {
        //image available
        // A.upload the new image
         //auto rename our image 
        //get the extentiion of our image (.jpg, .png, .gif etc) eg specialfood1.jpg
        $tmp = explode('.', $image_name);
        $ext = end($tmp);
        //$ext = end(explode('.', $image_name));                           //dont open this comment

        //rename the image
        $image_name = "Shoe-Name-".rand(0000, 9999).'.'.$ext;    //eg Food_Category_575.jpg
        




        $src_path = $_FILES['image']['tmp_name'];             //might be problem here 

        $dest_path = "../images/shoes/".$image_name;


        // finally upload the image
        $upload = move_uploaded_file($src_path, $dest_path);

        //check whether the image is uploaded or not
        //and if the image is not uploaded then we will stop the process and redirect with error message

        if($upload==false)
        {
            //set message
            $_SESSION['upload'] = "<div class='text-danger'>Failed to upload images</div>";
            //redirect to add category page
            header('location:'.SITEURL.'admin/manage-shoes.php');
            //stop the process
            die();
        }   
        //B.remove the current image if available
         if($current_image!="")
         {
              $remove_path = "../images/shoes/".$current_image;

              $remove = unlink($remove_path);
    
              //check whether the image is removed or not
              //if failed to remove image then display message and stop the process
              if($remove==false)
              {
              //failed to remove image
              $_SESSION['failed-remove'] = "<div class='text-danger'>Failed to remove current image</div>";
              header('location:'.SITEURL.'admin/manage-shoes.php');
              die();  //stop the process
              }

         }


        




      }
      else
      {
        $image_name = $current_image;
      }
    
    }
     else
     {
      $image_name = $current_image;
     }



   //3. update the database
   $sql3 = "UPDATE tbl_shoes SET
   title = '$title',
   description = '$description',
   price = $price,
   image_name = '$image_name',
   category_id = '$category',
   featured = '$featured',
   active = '$active'
   WHERE id=$id                             
   ";
                                     // remove the cotetion of id if problem coming
   //execute the query
   $res3 = mysqli_query($conn, $sql3);


   //4. redirect to manage shoes with message
   //check whether executed or not
   if($res3==true)
     {
    //category updated
    $_SESSION['update-shoes'] = "<div class='text-success'>shoes updated successfully</div>";
    //redirect to manage shoes
    //header('location:'.SITEURL.'admin/manage-shoes.php');               //   redirect is not happening by php thus we used javascript
    ?>
      <script>
     window.location.href='manage-shoes.php';      //  redirect is not happening by php thus we used javascript
    </script>
    <?php
   }
   else
   {
    //failed to update shoes
    $_SESSION['update-shoes'] = "<div class='text-danger'>Failed to update shoes</div>";
    //redirect to manage shoes
    ?>
    <script>
   window.location.href='manage-shoes.php';      //  redirect is not happening by php thus we used javascript
  </script>
  <?php
   // header('location:'.SITEURL.'admin/manage-shoes.php');
   }


}










          ?>

















    </div>        <!--this is of container-->


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->