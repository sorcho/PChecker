<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="topnav">
    <a class="active" href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Products</a>
    <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact me</a>
    <?php
    if (isset($_SESSION['email'])) {
      echo "<a style='float: right;' href='utente.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
            <a style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
    } else {
      echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Register</a>";
    }
    ?>
  </div>

  <center><img src="../IMG/io.jpeg" alt="letteralmente io"></center>

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