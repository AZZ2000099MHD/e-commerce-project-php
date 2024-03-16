
<?php

    session_start();
    include('server/connection.php');

    if(!isset($_SESSION['logged_in']))
    {
      header('location: login.php');
      exit;
    }

if(isset($_GET['logout']))
{
  if(isset($_SESSION['logged_in']))
  {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);


    header('location:login.php');

    exit;
  }
}


if(isset($_POST['change_password']))
{
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  $user_email= $_SESSION['user_email'];

   //if password not match
   if($password !== $confirmPassword){

    header('location: account.php?error=passwords not match');
  

  //if password is not 6 characters
  }else if(strlen($password)<6){

      header('location: account.php?error=password must be at least 6 characters');
}
    //no errors
  else
  {

 $stmt= $conn->prepare("UPDATE users SET user_password=? where user_email=? ");
 $stmt->bind_param('ss',md5($password),$user_email);

 if($stmt->execute())
 {
  header('location: account.php?message=password has been updated seccesfully');
 }

 else
 {
  header('location: account.php?error=coul not update your password');
 }

  }
}


// get order

if(isset($_SESSION['logged_in']))

{

  $user_id= $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id =?");

  $stmt->bind_param('i',$user_id);

  $stmt->execute();

  $orders = $stmt->get_result();





}




?>


 <?php  include('layouts/header.php');  ?>
  


<!--Account-->

<section class="my-5 py-5">

    <div class="row container mx-auto">



    <?php  if(isset($_GET['payment_message'] )) { ?>

      <p class="mt-5 py-4 text-center" style="color:green"> <?php  echo $_GET['payment_message'];   ?> </p>      

    <?php   }?>

 

        <div class="text container mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">

        <p class="text-center" style="color:green">  <?php if(isset($_GET['register_success']))  { echo  $_GET['register_success']; } ?>  </p>
        <p class="text-center" style="color:green">  <?php if(isset($_GET['login_success']))  { echo  $_GET['login_success']; } ?>  </p>
         

            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name  : <span>  <?php  if(isset($_SESSION['user_name'])) {echo $_SESSION['user_name'] ;} ?>     </span></p>
                <p>Email   :<span>   <?php if(isset($_SESSION['user_email']))  { echo $_SESSION['user_email'] ; } ?>  </span></p>
                <p><a href="#orders" id="orders-btn">Your Orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                

            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">

            <form id="account-form" method="POST" action="account.php">
              <p class="text-center" style="color:red">  <?php if(isset($_GET['error']))  { echo  $_GET['error']; } ?>  </p>
              <p class="text-center" style="color:green">  <?php if(isset($_GET['message']))  { echo  $_GET['message']; } ?>  </p>
                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="paassword" class="form-control" id="account-password"  name="Password"placeholder="Enter Password"/>
                </div>

                <div class="form-group">
                    <label> Confirm Password</label>
                    <input type="paassword" class="form-control" id="account-confirmpassword"  name="confirm_password" placeholder="Enter Password Again "/>
                </div>
            <div class="form-group">

                <input type="submit" value="change password" name="change_password" class="btn" id="change-passwrd-btn">
            </div>
            </form>
        </div>
    </div>
</section>







<!--orders-->

<section id="orders" class="orders container my-5 py-3">



  <div class="container mt-2">
    <h2 class="font-weight-bold text-center"> your orders <h2>
      <hr class="mx-auto">
    
    </div>


    <table class="mt-5 pt-5">
      <tr>
        <th>order id</th>
        <th>order cost </th>
        <th>order status </th>
        <th>order Date</th>
        <th>Order details</th>
    </tr>

    <?php
    
    while($row = $orders->fetch_assoc())
    {

    ?>
    
    
   

    <tr>
      <td>

        <!-- <div class="product-info">
          <img src="assets/imgs/featured.jpeg"/> 
          <div>
            <p class="mt-3"> <?php echo $row['order_id']; ?> </p>
          
          </div>
          </div> -->
          <span> <?php echo $row['order_id']; ?> </span>

      </td>


    <td> 
       <span> <?php echo $row['order_cost']; ?> </span>
   </td>

   <td> 
       <span> <?php echo $row['order_status']; ?> </span>
   </td>


   <td> 
       <span> <?php echo $row['order_date']; ?> </span>
   </td>

   <td> 
       <form method="POST" action="order_details2.php" >
        <input type="hidden" value="  <?php  echo $row['order_status'];   ?>  " name ="order_status" />
        <input type="hidden" value=" <?php echo $row['order_id'];    ?> "  name="order_id" />
        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details">
    </form>
   </td>


      </tr>

      <?php } ?>

   

    

     </table>
 </section>













    
   <!--footer-->
<footer class="mt-1 py-1">
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
        <h5 class="pb-2">Instagram</h5>
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   

</body>
</html>