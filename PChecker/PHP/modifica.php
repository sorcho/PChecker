<?php
session_start();

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Add Product</title>
</head>

<body>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Products</a>
        <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact me</a>
        <?php
        if (isset($_SESSION['email'])) {
            if ($_SESSION['root'] == 0) {
                echo "<a style='float: right;' href='utente.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
            } else {
                echo "<a class='active' style='float: right;' href='admin.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
            }
        } else {
            echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Register</a>";
        }
        ?>
    </div>

    <div class="footer">
        <div>
            <img class="logo" src="../IMG/logo.png" alt="PChecker">
            <span style="visibility: hidden;vertical-align: middle;">l</span>
        </div>
        <div class="copyright">
            <img style="visibility: hidden;" class="logo" src="../IMG/logo.png" alt="PChecker">
            <span style="vertical-align: middle;">PChecker&copy; 2020/2021</span>
        </div>
        <div></div>
    </div>
</body>

</html>