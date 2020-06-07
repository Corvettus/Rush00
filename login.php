<?php

	include("auth.php");

	@session_start();

	if (@$_POST["login"] && @$_POST["passwd"]) {
		if (auth($_POST["login"], $_POST["passwd"])) {
			$_SESSION["logged_user"] = $_POST["login"];
			header("Location: index.php");
		}
	}

?>

<form action="login.php" method="post" class="user-account__form login-form" id="accountForm">
	<label for="login" class="login-form__title">Username</label>
	<input type="text" placeholder="Enter username" name="login" class="login-form__input" required>
	<label for="passwd" class="login-form__title">Password</label>
	<input type="password" placeholder="Enter password" name="passwd" class="login-form__input" required>

	<button type="submit" class="login-form__btn btn_ok" value="OK">Login</button>
	<span class="login-form__create-link" id="openModal">Create account</span>
</form>
