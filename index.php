<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mov.io</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <nav>
        <a href="index.php" class="logo active">Mov.io</a>
        <ul>
            <li><?php echo 'Witaj, ' . $_SESSION['login'] ?></li>
            <li><a href="konto.php">Konto</a></li>
            <li><a href="cart.php">Koszyk</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </nav>
    <aside>
        <h3>Kategorie</h3>

        <ul>
            <!-- <li><a href="#">kategoria</a></li>
            <li><a href="#">kategoria</a></li>
            <li><a href="#">kategoria</a></li>
            <li><a href="#">kategoria</a></li>
            <li><a href="#">kategoria</a></li> -->
            <?php
            require_once "config.php";

            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            // $wyswietl_kategorie = "SELECT category_id, category FROM categories";
            // $wynik_wyswietl = mysqli_query($polaczenie, $wyswietl_kategorie);
            // while ($row = mysqli_fetch_array($wynik_wyswietl)) {
            //     echo "<li><a href=\"index.php?kategoria={$row['category']}\">" . ($row['category']) . "</a></li>";

            // }



            ?>
        </ul>
    </aside>

    <div class="content">


                <?php
                    //$wyswietl_film = "SELECT * FROM movies";
                    $wyswietl_film = "SELECT movie_id, title, author, category, picture, description, price, amount FROM movies INNER JOIN categories ON movies.category_id=categories.category_id";
                    $wynik_wyswietl_film = mysqli_query($polaczenie, $wyswietl_film);



                    while ($row_film = mysqli_fetch_array($wynik_wyswietl_film)) {
                        echo "<div class=\"card\">";
                        echo "<div class=\"img-overflow\">";
                        echo "<img src=\"{$row_film['picture']}\"/>";
                        echo "</div>";
                        echo "<div class=\"card-content\">";

                        echo "<h2>".$row_film['title']."</h2>";
                        echo "<i>{$row_film['category']}</i>";
                        echo "<p>".$row_film['description']."</p>";
                        echo "</div>";
                        echo '<div class="card-actions">';
                        echo '<span>'.$row_film['price'].'zł</span>';
                        echo '<form action="dodaj.php" method="POST">';
                        echo "<input type=\"hidden\" name=\"product_id\" value=\"{$row_film['movie_id']}\">";
                        echo "<input type=\"hidden\" name=\"session_id\" value=\"{$_SESSION['login']}\">";
                        echo '<button type="submit">Dodaj</button>';
                        echo '</form>';
                        echo '</div>';

                        echo "</div>";

                    }
                    $polaczenie->close();
                ?>
    </div>
</body>

</html>