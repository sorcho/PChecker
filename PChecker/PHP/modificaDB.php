<?php
$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$id = $_POST['IDP'];
$prezzo = $_POST['prezzo'];

$query = "update prodotti set prezzo = '$prezzo' where ID='$id'";
mysqli_query($conn, $query);

echo "<script>
        alert('Price updated correctly, you will now be redirected to the Admin Area!');
        window.location = 'admin.php';
      </script>";