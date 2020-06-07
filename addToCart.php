<?php

include "connectDB.php"

function addToCart($product_id) {

	$connection = connectDB();
	$query = "SELECT * FROM `carts`;";
	$carts = mysqli_query($connection, $query);
	$user_id = $_SESSINS["loggued_user"];

	$query = NULL;

	while ($row = mysqli_fetch_array($carts))
    	if ($row["id"] === $user_id && $row["product_id"] == $product_id) {
    		$count = $row["count"] + 1;
    		$query = "UPDATE `carts` SET `count`='{$count}' WHERE (`id`='{$user_id}' AND `product_id`='{$product_id}');";
    	}
    if (!query)
    	$query = "INSERT INTO `carts` (`id`, `product_id`, `count`) VALUES ('{$user_id}', '{$product_id}', 1);"

    $sql = mysqli_query($connection, $query);
}