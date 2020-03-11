<?php

	session_start();

	if (isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h1>Logowanie</h1>
            <form action="logowanie.php" method="post">
                <div class="form-group">
                <label>Nazwa użytkownika</label>
                <input type="text" name="login" class="input-login" required>
                </div>
                <div class="form-group">
                <label>Hasło</label>
                <input type="password" name="haslo" class="input-login" required>
                </div>
                 <div class="form-group">
                <button type="submit" class="btn-login">Zaloguj się</button>
                </div>
                <p>Nie posiadasz konta? <a href="register.php">Zarejestruj się teraz</a>.</p>
                <?php
                    echo @$_SESSION['blad'];
                ?>
            </form>
        </div>
    </div>
</body>
</html>
