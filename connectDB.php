<?php

function connectDB() {
	$connection = mysqli_connect("127.0.0.1","root", "") or die("MySQL Connection Failed");
	mysqli_select_db($connection, "db") or die("MySQL Database Selection Failed");
	return $connection;
}