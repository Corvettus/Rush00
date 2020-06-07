<?php

include "connectDB.php";

if (@(!$_POST || !$_POST["login"] || !$_POST["passwd"] || $_POST["submit"] !== "OK")) {
    echo "ERROR" . PHP_EOL;
    return;
}

$connection = connectDB();
$query = "SELECT * FROM `users`;";
$users = mysqli_query($connection, $query);

$login = $_POST["login"];

while ($row = mysqli_fetch_array($users))
    if ($row["login"] === $login) {
        echo "ERROR" . PHP_EOL;
        return;
    }

$passwd = hash("whirlpool", $_POST["passwd"]);

$query = "INSERT INTO `users` (`login`, `passwd`) VALUES ('{$login}', '{$passwd}');";

$sql = mysqli_query($connection, $query);

header("Location: index.html");