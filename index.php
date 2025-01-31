<?php
include __DIR__ . '/layout/header.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <title>EduSogno - Register</title>
</head>

<body>
    <main class="my-form">
        <h2 class="title">Crea il tuo account</h2>
        <div class="login">
            <form id="form" action="register.php" method="POST">
                <label for="name">Inserisci il nome</label>
                <input type="name" name="name" id="name" placeholder="Mario" required>

                <label for="lastname">Inserisci il cognome</label>
                <input type="lastname" name="lastname" id="lastname" placeholder="Rossi" required>

                <label for="email">Inserisci l'e-mail</label>
                <input type="email" name="email" id="email" placeholder="name@example.com" required>

                <label for="password">Inserisci la password</label>
                <input type="password" name="password" id="password" placeholder="Scrivila qui" required>

                <input type="submit" id="submit" value="Registrati">
                <div class="my_button">
                    <p>Hai già un account? <a href="login.html">Accedi</a></p>
                </div>
            </form>
        </div>
    </main>

</body>

</html>