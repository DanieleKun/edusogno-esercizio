<?php
//  database connection info
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'edusogno_esercizio';

// database connect
$db_connect = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
   // error
   exit('Errore durante la connessione: ' . mysqli_connect_error());
}