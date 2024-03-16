<?php
session_start();


if(isset($_POST['order_pay_btn']))  

{
   $order_status =   $_POST['order_status'];
   $order_total_price =  $_POST['order_total_price'];
}


?>












<?php  include('layouts/header.php');  ?>


     <!--payment-->

     
    <section class="my-5 py-5 ">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
          <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">

        
<div class="container text-center mt-3 pt-5">
            <h4 class="form-weight-bold">Full Payment</h4>
          <hr class="mx-auto">
        </div>

        <br>
        


        <?php  if(isset($_SESSION['total'])    &&  $_SESSION['total']   != 0  ) {       ?>
      
          <p> Total Payment  $ <?php   echo $_SESSION['total'] ; ?>     </p>


          <br>

          <div class="container text-center mt-3 pt-5">
            <h4 class="form-weight-bold">Advance  Payment</h4>
          <hr class="mx-auto">
        </div>

        <p> Advance Payment  $ <?php   echo $_SESSION['total']* 0.40 ; ?>     </p>
        



          
         <!-- <input class="btn btn-primary" type="submit" value="Pay Now"  > -->
         <div class=" container text-center mt-3 pt-5" id = "paypal-button-container"> </div>
         


         <?php }  else if(isset($_POST['order_status'])  &&  $_POST['order_status']   == "not paid"  ) { ?>





          <p> Total Payment : $ <?php echo $_POST['order_total_price']; ?>   </p>

          
            <!-- <input class="btn btn-primary"  type="submit"  value="Pay Now"  > -->

            <div id = "paypal-button-container"> </div>
          



            <?php } else {  ?>
              <p>   You dont have any order  </p>     

              <?php }  ?>



              <!-- <div id = "paypal-button-container"> </div> -->
           
 
            




        </div>
    </section>
 



<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>



<script>
  paypal.Buttons({
    //sets up transaction when a payment button is clicked

    createOrder: function(data, action)
    {
      return action.order.create({
        purchase_units: [{
          amount: {
            value : "77.44"
    }
  }]
});
    },


    onApprove: function(data, action) {
      return action.order.capture().then(function(orderData){
        console.log('Capture result' , orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payment.captures[0];
        alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available');



      });
      }
      
    }).render('#paypal-button-container');
</script>




<script src="payment_method.php"></script>

<div id = "paypal-button-container"> </div>











    <?php  include('layouts/footer.php');  ?>