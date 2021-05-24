<?php
session_start();

$email = $_POST["email"];
$ogg = $_POST["oggetto"];

$content = "From: " . $email . "\nMsg:\n" . $_POST["contenuto"] . "\nMessage End!!";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

mail("mariobrosscot@yahoo.it", $ogg, $content);

echo "<script>
        alert('Message sent successfully! You will now be redirected at the Homepage!');
        window.location= 'index.php'
      </script>";
