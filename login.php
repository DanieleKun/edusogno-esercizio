<?php
require_once('config.php');

$email = $db_connect->real_escape_string($_POST['email']);
$password = $db_connect->real_escape_string($_POST['password']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
    if($result = $db_connect->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();

                $_SESSION['success'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['nome'];
                $_SESSION['lastname'] = $row['cognome'];

                header("location: personal_events.php");
            } else {
                echo "Password errata";
            }
        } else{
            echo "Questa accont non esiste";
        }
    } else {
        echo "Errore nel login";
    }

    $db_connect->close();
}
