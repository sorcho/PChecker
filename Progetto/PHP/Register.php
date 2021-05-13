<?php

$db_name = 'utenti';
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = $_POST["password"];
$telefono = $_POST["telefono"];
$sesso = $_POST["sesso"];
$codice = $_POST['Codice'];
$code = $_POST['codiceNascosto'];

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

$sql = "INSERT INTO info (nome, cognome, email, password, telefono, sesso) values (?, ?, ?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssssis", $nome, $cognome, $email, $password, $telefono, $sesso);

$sql = "select email from info where email='$email'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "Utente già presente con questa email, verrai reindirizzato alla pagina di Login!";
    sleep(5);
    header("Location: ../HTML/Accedi.html");
} else {
    $stmt->execute();

    if ($code == $codice) {
        echo "Codice corretto!";

        echo "<br>Il tuo nome è: " . $nome;
        echo "<br>Il tuo cognome è: " . $cognome;
        echo "<br>La tua email è: " . $email;
        echo "<br>La tua password è: " . $password;
        echo "<br>La tua email è: " . $email;
        echo "<br>Il tuo numero di telefono è: " . $telefono;

        if ($sesso == "M")
            echo "<br> Il tuo sesso è: Maschio";
        elseif ($sesso == "F")
            echo "<br> Il tuo sesso è: Femmina";
        else
            echo "<br> Il tuo sesso è: Altro";


        echo "Ora verrai reindirizzato alla pagina di Login!";
        sleep(5);
        header("Location: ../HTML/Accedi.html");
    } else {
        echo "Codice errato!";
        $stmt = $link->prepare("DELETE FROM info WHERE email = $email");
        $stmt->execute();
    }
}

