<?php

	session_start();

	if (!isset($_SESSION['zalogowany']))
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
    <title>Twoje konto</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <nav>
        <a href="index.php" class="logo active">Mov.io</a>
        <ul>
            <li><?php echo 'Witaj, '.$_SESSION['login']?></li>
            <li><a href="konto.php">Konto</a></li>
            <li><a href="cart.php">Koszyk</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </nav>
    <div class="userpanel-wrapper">
        <div class="userpanel-card">
            <?php
                echo "<h1>Witaj, ".$_SESSION['login']."</h1>";

            ?>
        </div>
    </div>

</body>
</html>