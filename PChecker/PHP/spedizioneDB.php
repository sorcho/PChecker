<?php
session_start();

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$fiscale = $_SESSION['fiscale'];
$indirizzo = $_POST['indirizzo'];
$citta = $_POST['città'];
$provincia = $_POST['provincia'];
$cap = $_POST['CAP'];

$sql = "INSERT INTO spedizione (ID_Utente, indirizzo, città, provincia, cap) values (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $fiscale, $indirizzo, $citta, $provincia, $cap);
$stmt->execute();

echo "<script>
        alert('Shipping Info updated correctly, you will now be redirected at the Homepage!');
        window.location = 'index.php';
      </script>";