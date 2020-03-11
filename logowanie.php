<?php

	session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: login.php');
		exit();
	}

	require_once "config.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;

				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['login'] = $wiersz['username'];

				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: index.php');

			} else {

				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowe dane</span>';
				header('Location: login.php');

			}

		}

		$polaczenie->close();
	}

?>