<?php
session_start();

$email = $_POST["email"];
$password = $_POST["psw"];

$msgyes = "Accesso effettuato correttamente, verrai reindirizzato alla Home.";
$msgno = "Accesso non riuscito, credenziali errate o utente inesistente, verrai reindirizzato alla pagina di Login.";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$query = "select email, password, nome from utente where email='$email' and password='$password'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($count == 1) {
    $_SESSION["email"] = $email;
    $_SESSION["nome"] = $row['nome'];

    echo "<script>
            alert('$msgyes');
            window.location= 'index.php'
          </script>";
} else {
    echo "<script>
            alert('$msgno');
            window.location= 'login.php'
          </script>";
}
