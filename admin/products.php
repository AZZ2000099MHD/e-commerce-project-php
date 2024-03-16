 
<?php include('header.php');?>

<?php if(!isset($_SESSION['admin_logged_in'] )){  
    
    
header('location:login.php');
   exit();
 //cant go to index page wthout login
    
    
}
    

?>
<?php

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

                    $total_records_per_page = 5 ;
                    $offset = ($page_no-1) * $total_records_per_page;

                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;



                    $adjacents = "2";

                    $total_no_of_pages = ceil($total_records/$total_records_per_page);



                    

                    ///4. get all products

                    $stmt2 = $conn->prepare("SELECT * FROM product LIMIT $offset,$total_records_per_page");

                    $stmt2->execute();

                    $products = $stmt2->get_result();

              


                    





?> 

 <div class="container-fluid">
    <div class="row" style="min-height:1000px">
  
 
<?php include('sidemenu.php');?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">  
            
</div>
</div>
</div>


<h2>products</h2>

<?php if(isset($_GET['edit_success_message'])){ ?>
    <p class="text-center" style="color:green;"> <?php     echo $_GET['edit_success_message'];  ?></p>
    <?php } ?>

    <?php if(isset($_GET['edit_failure_message'])){ ?>
    <p class="text-center" style="color:red;"> <?php     echo $_GET['edit_failure_message'];  ?></p>
    <?php } ?>


    
<?php if(isset($_GET['deleted_successfully'])){ ?>
    <p class="text-center" style="color:green;"> <?php     echo $_GET['deleted_successfully'];  ?></p>
    <?php } ?>

    <?php if(isset($_GET['deleted_failure'])){ ?>
    <p class="text-center" style="color:red;"> <?php     echo $_GET['deleted_failure'];  ?></p>
    <?php } ?>

    
<?php if(isset($_GET['product_created'])){ ?>
    <p class="text-center" style="color:green;"> <?php     echo $_GET['product_created'];  ?></p>
    <?php } ?>

    <?php if(isset($_GET['product_failed'])){ ?>
    <p class="text-center" style="color:red;"> <?php     echo $_GET['product_failed'];  ?></p>
    <?php } ?>

    
    <?php if(isset($_GET['images_updated'])){ ?>
    <p class="text-center" style="color:green;"> <?php     echo $_GET['images_updated'];  ?></p>
    <?php } ?>


    
    <?php if(isset($_GET['images_failed'])){ ?>
    <p class="text-center" style="color:red;"> <?php     echo $_GET['images_failed'];  ?></p>
    <?php } ?>






<div c lass="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope ="col">Product ID</th>
                <th scope ="col">Product Image</th>
                <th scope ="col">Product Name</th>
                <th scope ="col">Product Price</th>
                <th scope ="col">Product Offer</th>
                <th scope ="col"> Product Category</th>
                <th scope ="col">Product Color</th>
                <th scope ="col">C/N Status</th>
                <th scope ="col">Edit_Image</th>
                <th scope ="col">Edit</th>
                <th scope ="col">Delete</th>
                
</tr>
</thead>
<tboay> 
    <?php  foreach ($products as $product){?>

<tr>

<td><?php  echo $product['product_id'] ;?></td>
<td><img src ="<?php  echo "../assetes/imgs/".$product['product_image'];?>" style ="width:70px; heiht:70px;"/></td>
<td><?php  echo $product['product_name'] ;?></td>
<td><?php  echo $product['product_price'] ;?></td>
<td><?php  echo $product['product_special_offer']."%" ;?></td>
<td><?php  echo $product['product_category'] ;?></td>
<td><?php  echo $product['product_color'] ;?></td>
<td><?php  echo $product['customize_status'] ;?></td>

<td><a class="btn btn-warning" href="<?php echo "edit_images.php?product_id=". $product['product_id']."&product_name=".$product['product_name'];?>"> Edit_Images </a></td>

<td><a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id'];?>"> Edit </a></td>


<td><a class="btn btn-danger"href="delete_product.php?product_id=<?php echo $product['product_id'];?>"> Delete </a></td>

</tr>

<?php }  ?> 
                </tbody>


                </table>


                <nav aria-label="page navigation example" class="mx-auto">
                                        <ul class="pagination mt-5 mx-auto">

                                        <li class="page-item <?php if ($page_no<=1){ echo 'disabled';}?>">
                                        <a class="page-link" href="<?php  if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>">previous</a></li>

<li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>

                                        <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                                        <?php if($page_no>=3){?>
                                        <li class="page-item"><a class="page-link" href="#">....</a></li>
                                        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"> <?php echo $page_no;?></a></li>
<?php } ?>
                                        <li class="page-item<?php if($page_no >= $total_no_of_pages)  { echo 'disabled'; }?>">
                                        <a class="page-link" href ="<?php if ($page_no >= $total_no_of_pages) { echo '#';} else{echo  "?page_no=".$page_no+1;} ?>">Next</a></li>
                                        </ul>
                                        <nav>

</div>


                </main>

</div>
</div> 

                                        </body>
                                        </html>



