<?php include('partials/menu.php');   ?>                       <!-- calling nav form menu-->


    <div class="container-fluid" style="background-color: #eeeff1;">
        <div class="row justify-content-evenly">
            <div class="col-10"  style="margin-top:20px;   margin-bottom:20px;">
                <h1>Add Shoes</h1>
                    <?php
                if(isset($_SESSION['upload-food']))
                {
                    echo $_SESSION['upload-food'];
                    unset($_SESSION['upload-food']);
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
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-5">
                <textarea name="description" ></textarea>
                </div>
                </div>




                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-5">
                <input type="number"  class="form-control" name="price" >
                </div>
                </div>



                <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Select Image</label>
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
                                $id = $row['id'];
                                $title = $row['title'];

                            ?>

                                <option value="<?php echo $id; ?>" ><?php echo $title;  ?></option>
      
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

  <!-- add category button -->
      <input type="submit" name="submit" value="Add Shoes" class="btn btn-success" style="margin-bottom:20px;" />

        </form>          <!--form ends-->











             </div>
        </div>
            








        
        <?php

            if(isset($_POST['submit']))
            {
                //Add the food in database
               // echo "clicked";
              $title = $_POST['title'];
              $description = $_POST['description'];
              $price = $_POST['price'];
              $category = $_POST['category'];

              // check whether the radio button for featured and active are checked or not
              if(isset($_POST['featured']))
              {
                $featured = $_POST['featured'];
              }
              else
              {
                $featured = "No";  //setting the default value
              }


              if(isset($_POST['active']))
              {
                $active = $_POST['active'];
              }
              else
              {
                $active = "No";  //setting the default value
              }






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
        $image_name = "Shoe-Name-".rand(0000, 9999).'.'.$ext;    //eg Food_Category_575.jpg
        




        $src = $_FILES['image']['tmp_name'];             //might be problem here 

        $dst = "../images/shoes/".$image_name;


        // finally upload the image
        $upload = move_uploaded_file($src, $dst);

        //check whether the image is uploaded or not
        //and if the image is not uploaded then we will stop the process and redirect with error message

        if($upload==false)
        {
            //set message
            $_SESSION['upload-food'] = "<div class='text-danger'>Failed to upload images</div>";
            //redirect to add category page
            header('location:'.SITEURL.'admin/add-shoes.php');
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


        //3/ insert into database
        //for numerial value we do not need to pass value inside codets but for string value it is compursory to add cotes
        $sql2 = "INSERT INTO tbl_shoes SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        featured = '$featured',
        active = '$active'
        ";



//3.execute the query and save it in database
$res2 = mysqli_query($conn, $sql2);

 
//4. check whether the query executed or not and data added or not
if($res2==true)
{
   //query executed and category added
   $_SESSION['add'] = "<div class='text-success'>Shoes added successfully</div>";
   //redirect to manage category page
   //header('location:'.SITEURL.'admin/manage-shoes.php');
   ?>
   <script>
  window.location.href='manage-shoes.php';      //  redirect is not happening by php thus we used javascript
 </script>
 <?php
}
else
{
   //Failed to add category
   $_SESSION['add'] = "<div class='text-danger'>Failed to add shoes</div>";
   //redirect to manage category page
  // header('location:'.SITEURL.'admin/manage-shoes.php');
  ?>
  <script>
 window.location.href='manage-shoes.php';      //  redirect is not happening by php thus we used javascript
</script>
<?php

}








            }






           ?>















    </div>        <!--this is of container-->


 <?php include('partials/footer.php'); ?>                      <!-- this is for footer-->