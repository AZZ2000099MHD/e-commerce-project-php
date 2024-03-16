
<?php

/* 

not paid
paid
shippped
deleivered 


*/



include('server/connection.php');


if(isset($_POST['order_details_btn']) && isset($_POST['order_id']))
{
    $order_id = $_POST['order_id'];
    
     $sql_stmt =  "SELECT * FROM orders WHERE order_id = ?";

    $result = mysqli_query($conn,$sql_stmt);

    if(musqli_num_rows($result)==1)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        echo 
        "<tr> 
            <td> ".$row['product_id']." </td>
            <td> ".$row['user_id']." </td>
            <td> ".$row['order_status']." </td>
            <td> ".$row['user_phone']." </td>


        </tr>" ;
      }
    }
  }

?>