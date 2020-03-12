<?php
    session_start();

    if (isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
    }

    require_once "config.php";
    $username = null;
    $password = null;
    $errors = array();

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if(isset($_POST['register_user'])) {
        $username = mysqli_real_escape_string($polaczenie, $_POST['username']);
        $password = mysqli_real_escape_string($polaczenie, $_POST['password']);

        if(empty($username)) {
            array_push($errors, "Wymagany jest login");
        }
        if(empty($password)) {
            array_push($errors, "Wymagane jest hasło");
        }

        $username_check = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($polaczenie, $username_check);
        $user = mysqli_fetch_assoc($result);

        if($user) {
            if($user['username'] === $username) {
                array_push($errors, "Login już istnieje");
            }
        }
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        if(count($errors)==0) {
        $query = "INSERT INTO users VALUES (null, '$username', '$password_hashed')";
        mysqli_query($polaczenie, $query);
        $_SESSION['success'] = "Utworzono konto";
        $_SESSION['login'] = $username;
        header('Location: index.php');
        }
    }






?>