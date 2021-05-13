<?php

$db_name = "gamecoacher";
$email = $_POST['email'];
$password = $_POST['password'];

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$link = mysqli_connect('localhost', 'root', '');

if ($link) {
    echo 'Connessione al database riuscita<br> ';
} else {
    die('could not connect: ' . mysqli_error($link));
}

$link->select_db($db_name);

$query = "select email, password from users where email='$email' and password='$password'";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "Accesso riuscito, stampa dei dati: <br>";

    $query = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    echo "<br>Username: " . $row['username'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Password: " . $row['password'] . "<br>";

    if ($row['sesso'] == 'M') 
        echo "Sesso: Maschio";
    else if ($row['sesso'] == 'F') 
        echo "Sesso: Femmina";
    else
        echo "Sesso: Altro";
    
    echo "<br>Tipo di utente: " . $row['tipo'];
}
?>