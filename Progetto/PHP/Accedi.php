<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

function controllo($conn_info, $query)     //Controlla in quel determinato collegamento se il comando inviato è stato eseguito con successo
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}


$db_name = 'utenti';

$link = mysqli_connect('localhost', 'root', ''); //Dichiara la connessione indicando indirizzo ip, nome utente e password, dandomi le informazioni necessarie riguardanti la connessione

if ($link) {
    echo 'connection successful<br> ';
} else {
    die('could not connect: ' . mysqli_error($link));            //Interrogando questa variabile possiamo sapere se la connessione è andata a buon fine, dando un messaggio di errore in caso contrario
}

$link->select_db($db_name);

$query = "select email, password from info where email='$email' and password='$password'";

$result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);

if ($count == 1) {
    //Crea delle variabili di sessione in cui vengono salvate le credenziali di accesso dell'utente
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    echo "Accesso riuscito, stampa dei dati: <br>";

    $query = "select * from info where email='$email' and password='$password'";

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    echo $row['nome'] . "<br>";
    echo $row['cognome'] . "<br>";
    echo $row['email'] . "<br>";
    echo $row['telefono'] . "<br>";
    echo $row['sesso'];
    if ($row['root'] == 1) {
        echo "Attivazione modalità Amministratore, attendere prego!";
        sleep(5);
        header("Location: ../HTML/Admin.html");
    } else
        header("Location: ../HTML/simpleUser.html");
}else
    echo "Credenziali errate o utente non presente nel database.";