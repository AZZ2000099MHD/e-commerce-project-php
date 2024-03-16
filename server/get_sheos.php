

<?php

include ('connection.php');

$stmt = $conn-> prepare("SELECT * FROM product WHERE product_category = 'shoes' LIMIT 4");

$stmt-> execute();


$sheos = $stmt-> get_result();

?>