<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="topnav">
    <a class="active" href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="#news"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a style="position: absolute; right: 0" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
  </div>
</body>

</html>