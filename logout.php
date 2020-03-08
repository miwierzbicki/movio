<?php

	session_start();
	require_once "config.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$query = "DELETE FROM cart WHERE username='{$_SESSION['login']}'";

	mysqli_query($polaczenie, $query);

	session_unset();

	header('Location: login.php');

?>