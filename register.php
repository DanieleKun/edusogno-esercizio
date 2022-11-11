<?php
include __DIR__ . '/layout/header.html';

require_once('config.php');

$name = $db_connect->real_escape_string($_POST['name']);
$lastname = $db_connect->real_escape_string($_POST['lastname']);
$email = $db_connect->real_escape_string($_POST['email']);
$password = $db_connect->real_escape_string($_POST['password']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Controllo dati corretti
if (!isset($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {
    exit('Compila tutti i campi');
}

// Controllo campi vuoti
if (empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])) {
    exit('Compila tutti i campi!');
}
// Controllo password
if (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 6) {
    exit('La password deve essere compresa tra 6 e 16 caratteri!');
}

// Controllo esistenza utente
if ($user_check = $db_connect->prepare('SELECT id, password FROM utenti WHERE email = ?')) {
    $user_check->bind_param('s', $_POST['email']);
    $user_check->execute();
    $user_check->store_result();
 
    if ($user_check->num_rows > 0) {
       echo "L'utente esiste";
    } else {
       //Aggiungo utente al db
       $sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$name', '$lastname', '$email', '$password_hash')";
       if ($db_connect->query($sql) === true) {
          echo "Registrazione effettuata con successo";
          header('location: login.html');
       } else {
          echo "Errore durante la registrazione $sql. " . $db_connect->error;
       }
    }
    $user_check->close();
 }

