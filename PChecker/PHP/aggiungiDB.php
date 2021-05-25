<?php

$modello = $_POST["modello"];
$prezzo = $_POST["prezzo"];
$tipologia = $_POST["tipologia"];
$img = "../IMG/" . $_POST["img"] . ".jpg";

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$sql = "INSERT INTO prodotti (modello, img_dir, prezzo, tipologia) values (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $modello, $img, $prezzo, $tipologia);

$sql = "select * from prodotti where modello='$modello'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<script>
            alert('Product already registered, you will now be redirected to the Admin Area!');
            window.location = 'admin.php';
          </script>";
} else {
    $stmt->execute();
    echo "<script>
            alert('Product added succesfully, you will now be redirected to the Product page!');
            window.location = 'prodotti.php';
          </script>";
}
