<?php

include "connectDB.php"
include "products.php"

function cartSumCount() {

	$connection = connectDB();
	$query = "SELECT * FROM `carts`;";
	$carts = mysqli_query($connection, $query);
	$user_id = $_SESSINS["loggued_user"];
	$counter = 0;

	while ($row = mysqli_fetch_array($carts))
    	if ($row['id'] === $user_id)
    		$counter += productPrice($row['product_id']) * $row['count'];

    return $counter;
}