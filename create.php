<?php

	function user_exist($users, $username) {
		foreach ($users as $user) {
			if ($user["login"] == $username){
				return true;
			}
		}
		return false;
	}


	if (@(bool)$_POST["login"] && @(bool)$_POST["passwd"] && @$_POST["submit"] === "OK") {
		$user["login"] = $_POST["login"];
		$user["passwd"] = hash("sha512", $_POST["passwd"]);

		if (!file_exists("./private")) {
			mkdir("./private");
		};

		if (file_exists("./private/passwd")) {
			$users = (array)unserialize(file_get_contents("./private/passwd"));
			if (user_exist($users, $user["login"])) {
				return ;
			}
		}
		$users[] = $user;
		$users = serialize($users);
		file_put_contents("./private/passwd", $users);
	}
	header("Location: index.php");
?>
