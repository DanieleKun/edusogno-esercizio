<?php
include __DIR__ . '/layout/header.html';
include __DIR__ . 'events.php';
require_once('config.php');
include('events.php');

session_start();

if (!isset($_SESSION['success']) || $_SESSION['success'] != true) {
    header("location: login.html");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <title>EduSogno - Personal Events</title>
</head>

<body>
    <main class="container">
        <h2>Ciao <?= $_SESSION['name']; ?> <?= $_SESSION['lastname']; ?> ecco i tuoi eventi</h2>

        <div class="card_container">
        <?php foreach ($user_events as $event) : ?>
            <section class="card">
                <h3><?= $event['nome_evento'] ?></h3>
                <p><?= $event['data_evento'] ?></p>
                <button name="join" class="button">JOIN</button>
            </section>
        <?php endforeach; ?>
        </div>

        <button class="btn_logout"><a href="logout.php">Logout</a></button>

    </main>

</body>

</html>