<?php
session_start();

$email = $_POST["email"];
$ogg = $_POST["oggetto"];

$content = "From: " . $email . "\nMsg:\n" . $_POST["contenuto"] . "\nFINE MESSAGGIO!!";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "root", "", "pchecker");

mail("mariobrosscot@yahoo.it", $ogg, $content);

echo "<script>
        alert('Messaggio inviato con successo! Verrai ora reindirizzato alla home!');
        window.location= 'index.php'
      </script>";
