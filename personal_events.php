<?php
include __DIR__ . '/layout/header.html';
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
    <main class="my-form">
        <?php echo "<h2>Ciao<h2>" . $_SESSION["name"] . $_SESSION["lastname"]; ?>


        <button><a href="logout.php">Esci</a></button>

    </main>
</body>

</html>