<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM product WHERE product_category='clothes' LIMIT 4");

$stmt->execute();

$coats_products = $stmt->get_result();


?>