<?php
session_start();
$nome = "";
$cognome = "";
$email = $_SESSION["email"];
$password = $_SESSION["password"];
$telefono = "";
$sesso =    "";

$db_name = 'utenti';

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$link = mysqli_connect('localhost', 'root', ''); //Dichiara la connessione indicando indirizzo ip, nome utente e password, dandomi le informazioni necessarie riguardanti la connessione

if ($link) {
    echo 'connection successful<br> ';
} else {
    die('could not connect: ' . mysqli_error($link));            //Interrogando questa variabile possiamo sapere se la connessione è andata a buon fine, dando un messaggio di errore in caso contrario
}

$link->select_db($db_name);

if($_POST['scelta'] == 1) {
    $query = "select email, password from info where email='$email' and password='$password'";

    $result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $query = "select * from info where email='$email' and password='$password'";
        controllo($link, $query);

        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        echo "Salvataggio info utente per trasporto all'HTML";
        $nome =     $row['nome'];
        $cognome =  $row['cognome'];
        $telefono = $row['telefono'];
        $sesso =    $row['sesso'];
    }
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/assets.css" type="text/css">
    <link rel="stylesheet" href="../CSS/navbar.css" type="text/css">

    <script type="text/javascript" src="../JS/scripts.js"></script>

    <title>Profilo</title>
</head>
<body>

<div class="navbar">
    <a href="../HTML/index.html"><i class="fa fa-home" aria-hidden="true"> Home</i></a>
    <a href="../HTML/Contattaci.html"><i class="fa fa-envelope" aria-hidden="true"> Contattaci</i></a>
    <a class="active pointer"><i class="fa fa-sign-in" aria-hidden="true"> Profilo</i></a>
</div>

<<div>
    <span><h1>Nome</h1></span>
    <h7><?php echo $nome; ?></h7> <!-- TODO Risolvere problema richiamo variabile dal php  a questo output HTML-->
<h7>Desideri assistenza con un tocco personale?<br>Inviaci un’email, ti ricontatteremo entro 48 ore dalla ricezione della tua richiesta.</h7>
</div>

</body>
</html>
