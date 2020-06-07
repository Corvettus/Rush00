<?php

include "connectDB.php";

function products() {
	$connection = connectDB();
	
	$query = "SELECT * FROM `catalog`;";
	$result = mysqli_query($connection, $query);
	
	while ($row = mysqli_fetch_array($result)) {
	    $id = $row['id'];
	    $products[$id]['name'] = $row['name'];
	    $products[$id]['description'] = $row['description'];
	    $products[$id]['category_id'] = $row['category_id'];
	    $products[$id]['price'] = $row['price'];
	    $products[$id]['img'] = $row['img'];
	}
	return $products;
}