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
      if ($_SESSION['root'] == 0) {
        echo "<a style='float: right;' href='utente.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
      } else {
        echo "<a style='float: right;' href='admin.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
      }
    } else {
      echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Register</a>";
    }
    ?>
  </div>

  <center>
    <img src="../IMG/logo.png" alt="logo">
  </center>

  <div style="float: left; color: white; font-size: 35px;">
    <p>PChecker is a website that allows every user to buy Hardware for their PC in an easy and intuitive way!<br>
      You just have to register your user on the apposite Register tab, then Log-in and the job is done!<br>
      PChecker borns from my passion for the PC world and Computer Science in general, this way I can merge my passions together.<br>
      I thought that someone new can discover this website but may not know anything about these topic, so a good idea would be watching some
      very good videos, the first will taught you how to build your own PC, the second will teach you something about coding in general.</p>
  </div>
  <iframe width="750" height="500" style="margin-left: 20px ;float: left;" src="https://www.youtube.com/embed/v7MYOpFONCU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <iframe width="750" height="500" style="margin-right: 20px ;float: right;" src="https://www.youtube.com/embed/RRubcjpTkks" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</body>

</html>