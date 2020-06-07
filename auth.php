<?php

	$PASSWD_FILE = "../private/passwd";
	$PASSWD_HASH = "sha512";

	function auth($login, $passwd) {
		global $PASSWD_FILE;
		global $PASSWD_HASH;

		if (!$login || !$passwd || !file_exists($PASSWD_FILE))
			return false;

		$users = unserialize(@file_get_contents($PASSWD_FILE));
		foreach ($users as $user) {
			if ($user["login"] === $login && $user["passwd"] === hash($PASSWD_HASH, $passwd)) {
				return true;
			}
		}
		return false;
	}

?>
