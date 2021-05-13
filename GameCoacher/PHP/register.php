<?php

$db_name = "gamecoacher";
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$sesso = $_POST["sesso"];
$tipo = $_POST["tipo"];

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

$sql = "INSERT INTO users (username, email, password, sesso, tipo) values (?, ?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("sssss", $username, $email, $password, $sesso, $tipo);

$sql = "select email from users where email='$email'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "Questo utente è già presente nel database, per favore effettuare l'accesso!";
} else {
    $stmt->execute();
        echo "Codice corretto!";

        echo "<br>Il tuo username è: " . $username;
        echo "<br>La tua email è: " . $email;
        echo "<br>La tua password è: " . $password;
        echo "<br>Attualmente sei registrato come: " . $tipo;

        if ($sesso == "M")
            echo "<br> Il tuo sesso è: Maschio";
        elseif ($sesso == "F")
            echo "<br> Il tuo sesso è: Femmina";
        else
            echo "<br> Il tuo sesso è: Altro";
    }
?>