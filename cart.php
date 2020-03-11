<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <nav>
        <a href="index.php" class="logo active">Mov.io <i class="las la-film" style="font-size: 16px"></i></a>
        <ul>
            <li><?php echo 'Witaj, ' . @$_SESSION['login'] ?></li>
            <li><a href="konto.php">Konto</a></li>
            <li><a href="#">Koszyk</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </nav>
    <div class="cart-container">
        <div class="cart-card">
             <?php
                $suma = null;
                require_once "config.php";
                $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                $wyswietl_koszyk = "SELECT movies.movie_id, title, author, category_id, picture, description, price, amount FROM movies INNER JOIN cart ON movies.movie_id=cart.movie_id WHERE username='{$_SESSION['login']}'";
                $wynik_wyswietl_koszyk = mysqli_query($polaczenie, $wyswietl_koszyk);
                if(!$wynik_wyswietl_koszyk) {
                    printf("Error: %s\n", mysqli_error($polaczenie));
                    exit();
                }
                echo "<table>
                <tr>
                <th>Film</th>
                <th>Cena</th>
                </tr>";
                while($row = mysqli_fetch_array($wynik_wyswietl_koszyk)) {
                    echo "<tr><td>".$row['title']."</td><td>".$row['price']."zł</td></tr>";
                    @$suma+=$row['price'];
                }
                echo "</table>";

             ?>
        </div>
        <div class="cart-price">
            <?php echo "Łącznie: ".$suma."zł";?>
        </div>
    </div>
</body>
</html>