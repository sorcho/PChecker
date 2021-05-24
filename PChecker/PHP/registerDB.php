<?php

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$fiscale = $_POST["fiscale"];
$email = $_POST["email"];
$password = $_POST["psw"];

$pswcrypt = password_hash($password, PASSWORD_DEFAULT);

$msgyes="User registered correctly, you will now be redirected at the Homepage!";
$msgno="User already exists with this Tax Code, you will now be redirected at the Log-in page.";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$sql = "INSERT INTO utente (nome, cognome, codice_fiscale, email, password) values (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $cognome, $fiscale, $email, $pswcrypt);

$sql = "select codice_fiscale from utente where codice_fiscale='$fiscale'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<script>
            alert('$msgno');
            window.location = 'login.php';
          </script>";
} else {
    $stmt->execute();
    echo "<script>
            alert('$msgyes');
            window.location = 'index.php';
          </script>";
}
