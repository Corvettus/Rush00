<?php

include "connectDB.php";

function auth($login, $passwd) {
	if (!$login || !$passwd)
    	return false;
    $connection = connectDB();
    $query = "SELECT * FROM `users`;";
    $users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($users))
    	if ($row["login"] === $login && $row["passwd"] === hash("whirlpool", $passwd))
    		return true;
    return false;
}