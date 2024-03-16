<?php



session_start();
include ('connection.php');


if(isset($_GET['transaction_id'])  && isset($_GET['order_id'])  )
{

    $order_id = $_GET['order_id'];
    $order_status = "paid";
    $transaction_id  = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
     $payment_date =   date('Y-m-d H:i:s');

        //changeorder_status  to paid
        $stmt= $conn->prepare("UPDATE orders users SET order_status=? where order_id=? ");
        $stmt->bind_param('si',$order_status,$order_id);

        $stmt->execute();

    

        //store payment info

     $stmt1 =    $conn->prepare("INSERT INTO payments (order_id, user_id, transaction_id, payment_date) VALUES (?,?,?,?)");

        $stmt1 ->bind_param('iiss', $order_id, $user_id,  $transaction_id, $payment_date);

        $stmt1 ->execute();





        //go user account


        header("location: ../ account.php?payment_message=paid successfully, thanks for your shopping with us");




}


else {
    header("loaction: index.php");
    exit;
}




?>