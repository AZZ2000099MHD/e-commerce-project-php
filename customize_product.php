
<?php


include('server/connection.php');


///use the search section

if(isset($_POST['search']))
{

  if(isset($_GET['page_no'])  && $_GET['page_no'] != ""  )
  {

    
    //if user user hase entered page then numberis the one that they selected
    $page_no = $_GET['page_no'];
  }

  else{

    //if user just came entered page when default page is 1
    $page_no = 1;
  }


    $category = $_POST['category'];
    $price = $_POST['price'];


      //2. return the number of producrs
      $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records  FROM product WHERE product_category=? AND product_price<=? AND customize_status='yes'");
      $stmt1->bind_param('si',$category,$price);
      $stmt1->execute();
      $stmt1->bind_result($total_records);
      $stmt1->store_result();
      $stmt1->fetch();




        //3. total  number of products in per page

        $total_records_per_page = 8;
        $offset = ($page_no-1) * $total_records_per_page;

        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";
        $total_no_of_pages = ceil($total_records/$total_records_per_page);



           ///4. get all products

        $stmt2 = $conn->prepare("SELECT * FROM product  WHERE product_category=? AND product_price<=? AND customize_status = 'yes'  LIMIT  $offset,$total_records_per_page");

        $stmt2->bind_param("si",$category,$price);

        $stmt2->execute();

        $products = $stmt2->get_result();   //[ ]






  

  

}


///retirn all products if you have small business

else
{

  //1. determine page number

    if(isset($_GET['page_no'])  && $_GET['page_no'] != ""  )
    {

      
      //if user user hase entered page then numberis the one that they selected
      $page_no = $_GET['page_no'];
    }

    else{

      //if user just came entered page when default page is 1
      $page_no = 1;
    }


      //2. return the number of producrs
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records  FROM product");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();





    //3. total  number of products in per page

    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;



    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);



     

    ///4. get all products

    $stmt2 = $conn->prepare("SELECT * FROM product WHERE customize_status ='yes' LIMIT $offset,$total_records_per_page");

    $stmt2->execute();

    $products = $stmt2->get_result();

      // $stmt = $conn->prepare("SELECT * FROM product");

      // $stmt->execute();

      // $products = $stmt->get_result();


}




?>

<?php include('layouts/header.php')?>



<!---search-->

<section id="search" class="search container my-5 py-5 ms-2">
<div class="container text-center mt-5 py-5">

<p class="font-weight-bold text-left"> Search products</p>
              <hr class="mx-left">
</div> 

<form action="customize_product.php" method="POST">

  <div class="row container">
    <div class="col-lg-12 col-md-12 col-sm-12">

    <p class="font-weight-bold text-left"> Category</p>

  
      <div class="form-check">

        <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one"    <?php  if(isset($category) && $category=='shoes' ) {echo 'checked';}   ?>>
        <label class="form-check-label" for="flexRadioDefault1">
          Shoes
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input"  value="clothes" type="radio" name="category" id="category_two"   <?php  if(isset($category) && $category=='clothes' ) {echo 'checked';}   ?> >
        <label class="form-check-label" for="flexRadioDefault2">
            Clothes
        </label>
      </div>



      <div class="form-check">
        <input class="form-check-input"  value="watches" type="radio" name="category" id="category_three"   <?php  if(isset($category) && $category=='watches' ) {echo 'checked';}   ?> >
        <label class="form-check-label" for="flexRadioDefault3">
          Watches
        </label>
      </div>


      <div class="form-check">
        <input class="form-check-input"  value="bags"  type="radio" name="category" id="category_four"  <?php  if(isset($category) && $category=='bags' ) {echo 'checked';}   ?>>
        <label class="form-check-label" for="flexRadioDefault4">
         Bags
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input"  value="cosmetics" type="radio" name="category" id="category_five"   <?php  if(isset($category) && $category=='cosmetics' ) {echo 'checked';}   ?> >
        <label class="form-check-label" for="flexRadioDefault5">
          Cosmetics
        </label>
      </div>



    </div>
  </div>

    <div class="row mx-auto container mt-5">
      <div class="col-lg-12 col-md-12 col-sm-12">

      <p class="font-weight-bold"> Price </p>

        <input type="range" class="form-range w-50" name="price" value="  <?php  if(isset($price) ) {echo $price;} else{echo "100";} ?>" min="1" max="100000" id="customRange2">

        <div class="w-50">

        <span style="float: left;"><small> 
          1</small> </span>
          <span style="float: right;"> 
          <small>10,000</small></span>

        </div>
      </div>
    </div> 

    <div class="form-group my-3 mx-3">

      <input type="submit" name="search" value="Search" class="btn btn-primary">

    </div>


</form>
</section>



        <!----shop  -->

  <section id="shop" class= "my-5 py-5" >
  <div class="container text-center mt-5 py-5">

  <h3 class="font-weight-bold text-center">Our Customize Product</h3>
                                      <hr class="mx-auto">
                                      <p class="text-center">In here you can check out our custome products</p>
    </div>
         
    <div class="row mx-auto container">

      <!-----------phph--------->


     <?php while($row = $products->fetch_assoc()) { ?>

    <div onclick="window.location.href='single_customize_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">


    <img class="img-fluid mb-3"  name ="image_1" src="assetes/imgs/<?php echo $row['product_image']; ?>" />

    <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
     </div>        
              <h5 class="p-name"> <?php  echo $row['product_name'];?>  </h5>
              <h4 class="p-price">$  <?php  echo $row ['product_price']; ?>  </h4>
              <a class="btn shop-buy-btn" href="<?php  echo "single_customize_product.php?product_id=".$row['product_id'] ;  ?>"> Customize now </a>

     </div>





<?php } ?>











<nav aria-label="page navigation example" class="mx-auto">
<ul class="pagination mt-5 mx-auto">

<?php    ?>

    <li class="page-item <?php if($page_no<=1) {  echo 'disabled'; }  ?> " >   
         <a class="page-link" href=" <?php  if($page_no <=1) {echo '#';} else{ echo "?page_no=".($page_no - 1); }  ?>">previous</a>
        
    </li>
    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

    <?php if($page_no >=3)  {  ?>
    
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href=" <?php  echo "?page_no=".$page_no;   ?>"><?php echo $page_no;   ?>  </a></li>
    
    <?php  } ?>
    

    <li class="page-item  <?php  if($page_no >= $total_no_of_pages) { echo 'disabled';}  ?>  ">
    
    <a class="page-link" href="   <?php  if($page_no >= $total_no_of_pages) {echo '#';} else{echo "?page_no=".($page_no+1);} ?> ">Next</a>
  
  </li>

</ul>
<nav>
</div>
  </section>









         
     
<?php  include('layouts/footer.php');  ?>
