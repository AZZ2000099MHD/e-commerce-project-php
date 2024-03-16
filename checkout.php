<?php

session_start();
include ('server/connection.php');

if ( !empty($_SESSION['cart'])  ) {

//let user in



//sent user to nhome

}else {

  header('location:index.php');


}



?>


<?php  include('layouts/header.php');  ?>
     <!--Checkout-->

     
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
           <!-- <hr clasas="mx-center">-->
        </div>
        <div class="mx-auto container">
                       <form id="checkout-form" action ="server/place_order.php" method ="POST">
                       
                       <p class="text-center"  style="color:red;"> 
                               <?php if(isset($_GET['message'])) {  echo $_GET['message']; } ?> 

                               <?php  if(isset($_GET['message']))  { ?>

                                <a  href="login.php"  class="btn btn-primary" > Loggedin </a>


                                <?php   }  ?>
                      
                      </p>
                       
                       <div class="form-group checkout-small-element">
                            <label>Name</label>
                            <input type="text" class="form-control" id="checkout-name"  name="name" placeholder="Enter Your Name"requied/>
                        </div>

                        <div class="form-group checkout-small-element">
                            <label>Email</label>
                            <input type="text" class="form-control" id="checkout-email"  name="email" placeholder=" Enter Your Email"requied/>
                        </div>

                        <div class="form-group checkout-small-element">
                            <label>Phone</label>
                            <input type="tel" class="form-control" id="checkout-phone"  name="phone" placeholder="Enter phone"requied/>
                        </div>

                        <div class="form-group checkout-small-element">
                            <label> City</label>
                            <input type="text" class="form-control" id="checkout-city"  name="city" placeholder="Enter Your city"requied/>
                        </div>

                        
                        <div class="form-group checkout-large-element">
                            <label> Address</label>
                            <input type="text" class="form-control" id="checkout-address"  name="address" placeholder="Enter Your city"requied/>
                        </div>


                        <div class="form-group checkout-btn container">
                         <P>Total amount: $ <?php echo  $_SESSION['total']?> </p>

                               </div>

                         
                              
                        
                         <div>
                            <input type="submit" class="btn" id="checkout-btn" name ="place_order" value="Place Order"/>
                        </div> 

                        





                       </form>     

        </div>
    </section>
 


    <?php  include('layouts/footer.php');  ?>
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <img class="logo" src="../E-Commerce/assetes/imgs/logo.png">
      <p class="pt-3">We Provide the best Products for the most Affortable Prices</p>
     </div>
     <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2" >Featured</h5>
      <ul class="text-uppercase">
         <li><a href="#">men</a></li>
         <li><a href="#">Women</a></li>
         <li><a href="#">Boys</a></li>
         <li><a href="#">Girls</a></li>
         <li><a href="#">New Arraival</a></li>
         <li><a href="#">Clothes</a></li>
      </ul>
     </div>
  
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Contect Us</h5>
      <div>
        <h6 class="text-uppercase">Address</h6>
        <p> 122,Main Street,Colombo</p>
      </div>
  
      <div>
        <h6 class="text-uppercase">Phone</h6>
        <p>1234567890</p>
      </div>
      <div>
        <h6 class="text-uppercase">Email</h6>
        <p>shafra@gamiaal</p>
      </div>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">instagram</h5>
        <div class="row">
               <img src="../E-Commerce/assetes/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
               <img src="../E-Commerce/assetes/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
               <img src="../E-Commerce/assetes/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
               <img src="../E-Commerce/assetes/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
               <img src="../E-Commerce/assetes/imgs/1.jpg" class="img-fluid w-25 h-100 m-2">
        </div>
      </div>
    </div>
  
    <div class="copyright mt-5">
      <div class="row container mx-auto">
        <div class="col-lg-3 col-md-5 col-sm-12 md-4 ">
          <img src="../E-Commerce/assetes/imgs/payment.png"/>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
         <p> E-Commerce @2023 All Right Reserves</p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 md-4"> &nbsp   &nbsp &nbsp
          <a href="#"><i class="fab fa-facebook"></i> </a>
          <a href="#"><i class="fab fa-instagram"></i> </a>
          <a href="#"><i class="fab fa-twitter"></i> </a>
        </div>
      </div>
    </div>
  </footer>         
