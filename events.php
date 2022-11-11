<?php
require_once('config.php');

$email = $_SESSION['email'];
$sql_select = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$email%'";

if($db_connect->error) {
    error_log('Errore: ' . $db_connect->error);
}

$result = mysqli_query($db_connect, $sql_select);
$user_events = $result->fetch_all(MYSQLI_ASSOC);
$query_select = "SELECT * FROM utenti WHERE email = '$email'";
$result_query = mysqli_query($db_connect, $query_select);
$query_name = $result_query->fetch_all(MYSQLI_ASSOC);