<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h1>Dołącz do nas</h1>
            <form action="rejestracja.php" method="post">
                <div class="form-group">
                <label>Nazwa użytkownika</label>
                <input type="text" name="username" class="input-login" required>
                </div>
                <div class="form-group">
                <label>Hasło</label>
                <input type="password" name="password" class="input-login" required>
                </div>
                <div class="checkbox-group">
                <input type="checkbox" name="terms-agree" required>
                Akceptuję regulamin serwisu
                </div>
                 <div class="form-group">
                <button type="submit" class="btn-register" name="register_user">Utwórz konto</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>
