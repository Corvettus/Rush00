<?php

	if (@(bool)$_POST["login"] && @(bool)$_POST["oldpw"] && @(bool)$_POST["newpw"] && @$_POST["submit"] === "OK") {
		$user["login"] = $_POST["login"];
		$user["passwd"] = hash("sha512", $_POST["oldpw"]);
		$user_newpw = hash("sha512", $_POST["newpw"]);

		if (!file_exists("../private/passwd")) {
			echo "ERROR\n";
			return ;
		};

		$users = unserialize(file_get_contents("../private/passwd"));
		for ($i = 0; @$users[$i]; $i++) {
			if ($users[$i]["login"] === $user["login"] && $users[$i]["passwd"] === $user["passwd"]) {
				$users[$i]["passwd"] = $user_newpw;
				file_put_contents("../private/passwd", serialize($users));
				echo "OK\n";
				header("Location: index.php");
			}
		}
	}
	echo "ERROR\n";
?>
