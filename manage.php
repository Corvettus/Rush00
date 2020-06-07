<?php

	@session_start();

	$USER_NAME = $_SESSION["logged_user"];

	if (@$_POST["state"] == "logout") {
		@$_SESSION["logged_user"] = "";
		header("Location: index.php");
	}

?>
<form action="manage.php" method="post" class="user-account__form manage-form" id="accountForm">

	<p class="manage-form__title">
		Hello <b><?=@$USER_NAME?></b>
	</p>

	<button type="submit" class="manage-form__btn" id="openModal">Change password</button>
	<button type="submit" class="manage-form__btn" name="state" value="logout">Logout</button>
</form>
