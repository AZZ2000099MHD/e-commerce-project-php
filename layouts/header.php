<?php  

//session_start();


?>



<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/style.css"/>
    
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="assetes/css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        
      </head>
        <body>
 <!---navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-5 fixed-top" >
       <img src=  "assetes/imgs/store-logo.png" width="200px" height="75px"/>
       <h2 class="brand"></h2>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
              <a class="nav-link active"  href="index.php">Home</a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
          </li>

        

          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact Us</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="customize_product.php">Customize Products</a>
        </li>



          
          <li class="nav-item">
             <a href="cart.php"> 
                <i class="fas fa-shopping-bag">
                <?php  if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0 )  {     ?>
                
                    <span class="cart-quantity">  <?php    echo $_SESSION['quantity'];  ?>  </span>
                    <?php  } ?>


                    </i>
            
            </a> 
              <a href="account.php"><i class="fas fa-user"></i></a>
          </li>

          </ul>


    
     
      </div>   
         
      </nav>