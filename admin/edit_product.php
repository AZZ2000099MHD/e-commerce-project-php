<?php include('header.php'); ?>


<?php
        if(isset($_GET['product_id'])){

        $product_id= $_GET['product_id']; 
        $stmt = $conn->prepare("SELECT * FROM product  WHERE product_id=?");
        $stmt->bind_param( 'i',$product_id);
        $stmt->execute();

        $products= $stmt->get_result();

        }else if(isset($_POST['edit_btn'])){


            $product_id =$_POST['product_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $offer = $_POST['special-offer'];
            $color = $_POST['color'];
            $category = $_POST['category'];



            $stmt1 = $conn->prepare("UPDATE product SET product_name=?, 
            product_description=?,  product_price=?,   product_special_offer=?,  product_color=?,  product_category=? WHERE product_id=?");
            $stmt1->bind_param('ssssssi', $title, $description, $price, $offer, $color, $category, $product_id);
           
           
           if( $stmt1->execute()){
        
                header('location:products.php?edit_success_message=product has been updated successfully');
 
        }else{
            header('location:products.php?edit_failure_message=product has not been updated,try again');


        }

        
             


        


        }else{

        header('location:product.php');
        exit;


        }




?>


<div class="container-fluid">
    <div class="row" style="min-height:1000px">
    <?php   include('sidemenu.php');?>





    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">  
            
</div>
</div>
</div>

<h2>Edit product</h2>
<div class="table-responsive">


<div class="mx-auto container ">
 <form id="edit-form" method="POST" action="edit_product.php">
        <p style="color:red;"><?php if (isset($_GET['error'])){ echo $_GET['error'];}?> </p>

        <div class="form-group mt-2">

   <?php foreach ($products as $product){?>
    <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>"/>

            <label>Title</label>
            <input type="text" class="form-control" id="product-name" name="title" value="<?php  echo $product['product_name'] ?>" placeholder="Title" required/>
</div>



<div class="form-group mt-2">
            <label>Description</label>
            <input type="text" class="form-control" id="product-desc" name="description" value="<?php echo $product['product_description'] ?>"placeholder="Description"required/>
</div>



<div class="form-group mt-2">
            <label>Price</label>
            <input type="text" class="form-control" id="product-price" name="price" value="<?php echo $product['product_price'] ?>"placeholder="Price"required/>
</div>
 

<div class="form-group mt-2">
            <label>Category</label>
            <select class="form-select" name="category" required>

                <option value="bags">Bags</option>
                <option value="shoes">Shoes</option>
                <option value="watches">Watches</option>
                <option value="clothes">Clothes</option>
</select>
          
</div>
<div class="form-group mt-2">
            <label>Color</label>
            <input type="text" class="form-control" id="product-color" name="color" value="<?php echo $product['product_color'] ?>" placeholder="color" required/>
</div>

<div class="form-group mt-2">
            <label>Special Offer/Sale</label>
            <input type="number" class="form-control" id="product-offer" name="special-offer" value="<?php echo $product['product_special_offer'] ?>" placeholder="sale%" required/>
</div>


<div class="form-group mt-3">
    <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit"/>
    </<div>


    <?php } ?>
    </form>

 

