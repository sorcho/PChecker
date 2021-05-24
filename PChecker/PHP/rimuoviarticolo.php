<?php
$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$id = $_POST['id'];

$query = "select * FROM `carrello` WHERE `carrello`.`ID` = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $query = "DELETE FROM `carrello` WHERE `carrello`.`ID` = $id";

    controllo($conn, $query);

    header("Location: carrello.php");
}
