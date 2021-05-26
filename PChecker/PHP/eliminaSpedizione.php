<?php
session_start();

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$fiscale = $_SESSION['fiscale'];

$sql = "DELETE FROM spedizione WHERE ID_Utente = '$fiscale'";
mysqli_query($conn, $sql);

echo "<script>
        alert('Shipping Info deleted correctly, you will now be redirected at your Personal Area!');
        window.location = 'utente.php';
      </script>";