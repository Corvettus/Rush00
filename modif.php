<?php

include "connectDB.php";

if (@(!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"] || $_POST["submit"] !== "OK")) {
    echo "ERROR" . PHP_EOL;
    return;
}

$connection = connectDB();
$query = "SELECT * FROM `users`;";
$users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($users))
    if ($row["login"] === $_POST["login"] && $row["passwd"] === hash("whirlpool", $_POST["oldpw"])) {

        $passwd = hash("whirlpool", $_POST['newpw']);
        $login = $row["login"];

        $query = "UPDATE `users` SET `passwd` = '{$passwd}' WHERE `login` = '{$login}';";

        $sql = mysqli_query($connection, $query);

        header("Location: index.html");
        return;
    }
echo "ERROR" . PHP_EOL;