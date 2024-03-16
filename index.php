
<?php include('layouts/header.php'); ?>



          <!--Home-->

      <section id="home">
         <div class="container">
                <h5>NEW ARIVAL</h5>
                <h1><span>BEST PRICES </span>THIS SESSON</h1>
                <P> OUR SHOP OFFERS THE BEST PRODUCT AND THE MOST AFFERTABLE PRICE</P>
                <button>Shop Now</button>
        </div>
      </section>


         <!----------------------------Brand---------------------------->

      <section id="brand "class="container">
         <div class="row">

                  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assetes/imgs/mi.jpg"/>
                  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assetes/imgs/huawei-logo.jpg"/>
                  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assetes/imgs/puma logo.jpg"/>
                  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assetes/imgs/nike.jpg"/>
        
         </div>
      </section>


         <!--New-->

      <section id="new" class="w-100">
        <div class="row p-0-m-0">
  
          <!--one-->

        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                    <img class="img-fluid" src="assetes/imgs/shoe-2_1.jpg" width="50px" height="50px"/>
        <div class="details">
                      <h2>Extremely Awsome Shoes</h2> 
                      <button class="text-uppercase">Shop Now</button>
        </div>
        </div>


            <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                     <img class="img-fluid" src="assetes/imgs/watch-3.jpg" width="50px" height="50px"/>
        <div class="details">
                    <h2>Extremely Awsome Watch</h2> 
                    <button class="text-uppercase">Shop Now</button>
        </div>
        </div>


              <!--Three-->
       <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                  <img class="img-fluid" src="assetes/imgs/shorts-1.jpg" width="40px" height="50px"/>
      <div class="details">
                  <h2>Dress</h2> 
                  <button class="text-uppercase">Shop Now</button>
      </div>
      </div> 
      </div>
    </section>

   <!----Featured-->

   <section id="featured " class= "my-5 pb-5" >
     <div class="container text-center mt-5 py-5">
                 <h3>Our Featured</h3>
                 <hr class="mx-auto">
                 <p>In here you can check out our featutred products</p>
     </div>

     <div class="row mx-auto container fluid"> 
      <?php 
      include('server/get_featured_products.php');
      ?>

      <?php

       while($row =$featured_products->fetch_assoc()){
        ?>

     <div class="product text-center col-lg-3 col-md-4 col-sm-12">
               <img class="img-fluid mb-3" src="../E-Commerce/assetes/imgs/<?php 

               echo $row['product_image'];
               ?>
               "/>

      <div class="'star">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
      </div>        
               <h5 class="p-name">
                <?php
                echo $row ['product_name'];
                ?>
                </h5>
               <h4 class="p-price"> $
                <?php
                echo  $row ['product_price'];
                ?>
                </h4>
                <a  href ="<?php echo "single_product.php?product_id=".   $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
              </div>
          <?php

              }     ?>
       
   
      </div>
   </section>

<!--Banner-->
<section id="banner" class="my-5 py-5">
  <div class ="container">
    <h1>MID SEASON'S SALE</h1>
    <H1>Autum collection<br> Up to 30% OFF</H1>
    <button class="text-uppercase">SHOP NOW</button>
  </div>
</section>









<!--Clothes-->

<section id="featured " class= "my-5" >
  <div class="container text-center mt-5 py-5">
              <h3>Our Dresses & Coats</h3>
              <hr class="mx-auto">
              <p>In here you can check out our fassion Dresses</p>
  </div>

  <div class="row mx-auto container fluid">

  <?php 
  include('server/get_coats.php'); 
   ?>
  <?php while($row=$coats_products->fetch_assoc()) {  ?>


  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    
            <img class="img-fluid mb-3" src="assetes/imgs/<?php   echo $row['product_image'];   ?> "/>
   <div class="'star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
   </div>        
            <h5 class="p-name"> <?php echo $row['product_name']; ?> </h5>
            <h4 class="p-price"> $ <?php echo $row['product_price']; ?></h4>
            <a  href ="<?php echo "single_product.php?product_id=".   $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>

   </div>

   <?php    }  ?>

   </div>
</section>







<!--Watches-->
<section id="watches " class= "my-5" >
  <div class="container text-center mt-5 py-5">
              <h3>Collections of Watches</h3>
              <hr class="mx-auto">
              <p>take yours Watch</p>
  </div>

  <div class="row mx-auto container-fluid">


  <?php include('server/get_watches.php');  ?>
  <?php while($row=$watches->fetch_assoc()) {  ?>



  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
  <img class="img-fluid mb-3" src="../E-Commerce/assetes/imgs/<?php   echo $row['product_image'];   ?> "/>
   <div class="'star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
   </div>        
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"> $ <?php echo $row['product_price']; ?></h4>
            <a  href ="<?php echo "single_product.php?product_id=".   $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>

   </div>

   <?php  } ?>

       
   </div>
</section>






<!--SHOES-->
<section id="shoes " class= "my-5 pb-5" >
  <div class="container text-center mt-5 py-5">
              <h3>Branded Shoes</h3>
              <hr class="mx-auto">
              <p>In here you can check out our Branded Shoes</p>
  </div>

  <div class="row mx-auto container fluid">

  <?php include('server/get_sheos.php');  ?>
  <?php while($row=$sheos->fetch_assoc()) {  ?>


  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
  <img class="img-fluid mb-3" src="../E-Commerce/assetes/imgs/<?php   echo $row['product_image'];   ?> "/>
   <div class="'star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
   </div>        
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"> $ <?php echo $row['product_price']; ?></h4>
            <a  href ="<?php echo "single_product.php?product_id=".   $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>

   </div>

<?php   }   ?>
  
   </div>
</section>



<?php  include('layouts/footer.php'); ?>
   