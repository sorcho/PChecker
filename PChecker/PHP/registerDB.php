<?php

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$fiscale = $_POST["fiscale"];
$email = $_POST["email"];
$password = $_POST["psw"];

$msgyes="Utente registrato correttamente, verrai reindirizzato alla Home.";
$msgno="Utente già presente con questo codice fiscale, verrai reindirizzato alla pagina di Login.";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$sql = "INSERT INTO utente (nome, cognome, codice_fiscale, email, password) values (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $cognome, $fiscale, $email, $password);

$sql = "select codice_fiscale from utente where codice_fiscale='$fiscale'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<script>
            alert('$msgno');
            window.location= 'login.php'
          </script>";
} else {
    $stmt->execute();
    echo "<script>
            alert('$msgyes');
            window.location= 'index.php'
          </script>";
}
