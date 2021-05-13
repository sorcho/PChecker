<?php

//Dichiarazione variabili
$username = $_POST['Username'];
$password = $_POST['Password'];
$email = $_POST['Email'];
$cellulare = $_POST['Cellulare'];
$sesso = $_POST['Sesso'];
$admin = $_POST['Admin'];
$codice = $_POST['Codice'];
$code = $_POST['codiceNascosto'];

function check($link, $sql)
{
    if (mysqli_query($link, $sql))
        echo "Query successfully executed.<br>";
    else
        echo "Error during query execution: " . mysqli_error($link);
}

$link = mysqli_connect('localhost', 'root', '');
if (!$link)
    die('could not connect: ' . mysqli_error($link));

$link->select_db("login");

$stmt = $link->prepare("insert into Utente values (?,?,?,?,?)");
$stmt->bind_param("sssis", $username, $email, $password, $cellulare, $sesso);

$sql = "select cellulare from utente where cellulare='$cellulare'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1)
    echo "Utente già presente con questo numero di telefono, effettuare il Login.";
else {
    $stmt->execute();

    if ($code == $codice) {
        echo "Codice corretto!";

        echo "<br>Il tuo username è: " . $username;
        echo "<br>La tua password è: " . $password;
        echo "<br>La tua email è: " . $email;
        echo "<br>Il tuo numero di telefono è: " . $cellulare;

        if ($sesso == "Maschio")
            echo "<br> Il tuo sesso è: Maschio";
        elseif ($sesso == "Femmina")
            echo "<br> Il tuo sesso è: Femmina";
        else
            echo "<br> Il tuo sesso è: Altro";
    } else {
        echo "Codice errato!";
        $stmt = $link->prepare("DELETE FROM utente WHERE Cellulare = $cellulare");
        $stmt->execute();
    }
}
