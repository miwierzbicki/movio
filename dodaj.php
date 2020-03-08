<?php
    require_once "config.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $productId = $_POST['product_id'];
    $username = $_POST['session_id'];
    echo $productId."<br/>".$username;
    $zapytanie = "INSERT INTO cart VALUES('$username','$productId')";
    $wynik = mysqli_query($polaczenie, $zapytanie);

    header('Location: index.php');


?>