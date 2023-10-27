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
                <h1>About Us - MyShoeSite</h1>
            </div>
        </div>




        <div class="row justify-content-evenly">


    <h1>About Us</h1>
    <p>Welcome to MyShoeSite, the online marketplace where you can find all your favorite shoes at affordable prices.</p>
    <h2>Our Story</h2>
    <p>My vision is to make shopping easy and affordable for everyone. Today, we offer a wide range of Shoes, from Formal and athletics to casual and many more shoes.
    This application allows customers to shop and buy the items online.  MyShoeSite is a one-stop-shop for all shoe enthusiasts, where they can find a variety of shoes
    </p>
    <h2>Our Mission</h2>
    <p>Our mission is to provide our customers with the best online shopping experience possible. We believe that everyone should have access to high-quality products at affordable prices, and we work hard to make that a reality.
    The goal of MyShoeSite is to provide a 
 convenient and hassle-free shopping experience for shoe lovers. The website offers a user-friendly interface that allows customers to easily navigate through the various categories of shoes available. 

Customers can browse through the shoes based on their preferred brand, size, color, and style.
    </p>
    
    <h2>Contact Us</h2>
    <p>If you have any questions or concerns, please don't hesitate to contact us. You can reach us by phone at 7738751647 or by email at ghadiganesh2002@gmail.com</p>
  



















        </div>

















</div>       <!--this is for container-->
  

<?php include('partials-front/footer.php');  ?>


















