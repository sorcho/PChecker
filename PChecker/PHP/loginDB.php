<?php
session_start();

$email = $_POST["email"];
$password = $_POST["psw"];

$msgyes = "Log-in executed with no errores! You will now be redirected at the Homepage!";
$msgno = "Log-in error, wrong log-in informations or no user found, You will now be redirected at the Log-in page.";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$query = "select email, password from utente where email='$email'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $testpsw = $row['password'];
}

$length = strlen($testpsw);
$passwordDecrypt = substr(crypt($_POST["psw"], $testpsw), 0, $length);

$query = "select * from utente where email='$email' and password='$passwordDecrypt'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($count == 1) {
    $_SESSION["email"] = $email;
    $_SESSION["fiscale"] = $row['codice_fiscale'];
    $_SESSION["nome"] = $row['nome'];

    echo "<script>
            alert('$msgyes');
            window.location= 'index.php';
          </script>";
} else {
    echo "<script>
            alert('$msgno');
            window.location= 'login.php';
          </script>";
}
