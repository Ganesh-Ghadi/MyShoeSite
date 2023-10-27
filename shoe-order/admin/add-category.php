<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10" style="margin-top:20px; margin-bottom:30px;">
                <h1>Add Category</h1>

              <?php
                  
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
               



              
                ?>







            </div>
        </div>


        <div class="row justify-content-evenly">
            <div class="col-md-11">

              <!-- form control -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
<label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-5">
      <input type="text" name="title"  class="form-control" id="title">
    </div>
  </div>


  <div class="mb-3 row">
<label class="col-sm-2 col-form-label">Select Image</label>
<div class="col-sm-5">
    <input type="file" name="image">
            </div>
            </div>


  <div class="mb-3 row">
  <label class="col-sm-2 col-form-label">Featured</label>
  <div class="col-sm-5">
  <input type="radio" name="featured" value="Yes">Yes
  <input type="radio" name="featured" value="No">No
</div>
</div>



<div class="mb-3 row">
  <label class="col-sm-2 col-form-label">Active</label>
  <div class="col-sm-5">
  <input type="radio" name="active" value="Yes">Yes
  <input type="radio" name="active" value="No">No
</div>
</div>



<div class="mb-3 row">
  <label class="col-sm-2 col-form-label">Category</label>
  <div class="col-sm-5">
  <input type="radio" name="category_name" value="Men">Men
  <input type="radio" name="category_name" value="Women">Women
  <input type="radio" name="category_name" value="Kids">Kids
</div>
</div>





<!-- add category button -->
<input type="submit" name="submit" value="Add Category" class="btn btn-success" style="margin-bottom:20px;" />

</form>          <!--form ends-->


<?php
  //check whether the submit button is clicked or not
  if(isset($_POST['submit']))
  {
    //echo "clicked";
    //1.get the value from category form
     $title = $_POST['title'];

     // for radio input we need to check whether the button is selected or not
     if(isset($_POST['featured']))
     {
        //get the value from form
        $featured = $_POST['featured'];
     }
     else
     {
        //set default value
        $featured = "No";

     }

    //  same for active
    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No";
    }
        
    //  same for category
    if(isset($_POST['category_name']))
    {
        $category_name = $_POST['category_name'];
    }
    else
    {
        $category_name = "No";
    }



     // check whether the image is selected or not and set the vaalue for image name accordingly
     //print_r($_FILES['image']);

     //die();  // break the code here

     if(isset($_FILES['image']['name']))
     {
        // upload the image
        //to upload the image we need image name, sourch path and destination path
        $image_name = $_FILES['image']['name'];

         //upload the image only if iimage is selected
         if($image_name != "")
         {


         
         //auto rename our image 
        //get the extentiion of our image (.jpg, .png, .gif etc) eg specialfood1.jpg
        //$ext = end(explode('.', $image_name));
        $tmp = explode('.', $image_name);
        $ext = end($tmp);

        //rename the image
        $image_name = "Shoes_Category_".rand(0000, 9999).'.'.$ext;    //eg Food_Category_575.jpg
        




        $source_path = $_FILES['image']['tmp_name'];             //might be problem here 

        $destination_path = "../images/category/".$image_name;


        // finally upload the image
        $upload = move_uploaded_file($source_path, $destination_path);

        //check whether the image is uploaded or not
        //and if the image is not uploaded then we will stop the process and redirect with error message

        if($upload==false)
        {
            //set message
            $_SESSION['upload'] = "<div class='text-danger'>Failed to upload images</div>";
            //redirect to add category page
            header('location:'.SITEURL.'admin/add-category.php');
            //stop the process
            die();
        }   
      }




       }
       else
        {
            //don't upload image and set the image_name value as black
            $image_name="";
        }

       




     



    //2. create an sql query to insert category into database
       $sql = "INSERT INTO tbl_category SET
             title = '$title',
             image_name = '$image_name',
             featured = '$featured',
             active = '$active',
             category_name = '$category_name'
             ";
  


    //3.execute the query and save it in database
    $res = mysqli_query($conn, $sql);

      
     //4. check whether the query executed or not and data added or not
     if($res==true)
     {
        //query executed and category added
        $_SESSION['add'] = "<div class='text-success'>Category added successfully</div>";
        //redirect to manage category page
        //header('location:'.SITEURL.'admin/manage-category.php');
        ?>
        <script>
       window.location.href='manage-category.php';      //  redirect is not happening by php thus we used javascript
      </script>
      <?php
     }
     else
     {
        //Failed to add category
        $_SESSION['add'] = "<div class='text-danger'>Failed to add category</div>";
        //redirect to manage category page
        //header('location:'.SITEURL.'admin/manage-category.php');
        ?>
        <script>
       window.location.href='manage-category.php';      //  redirect is not happening by php thus we used javascript
      </script>
      <?php

     }



  }



?>







            </div>
        </div>

















    </div>                      <!--this is of container-->


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->








































 




