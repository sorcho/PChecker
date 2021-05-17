<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<style>
  .ogg,
  input[type="email"] {
    width: 50%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #252525;
    text-align: center;
    color: white;
  }

  .content {
    width: 98.4%;
    height: 200px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #252525;
    color: white;
  }

  input[type="text"]:focus,
  input[type="password"]:focus,
  input[type="email"]:focus {
    background-color: #343434;
    outline: none;
  }
</style>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="../CSS/navbar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Contatti</title>
</head>

<body>
  <div class="topnav">
    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a class="active" href=""><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a style="position: absolute; right: 0" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
  </div>

  <form>
    <div>
      <?php
      if ($_SESSION['email'] != null) {
        echo "<input type='email' readonly name='email' value=" . $_SESSION['email'] . ">";
      } else {
        echo "<input type='email' name='email' />";
      }
      ?>
      <input class="ogg" type="text" name="oggetto" />
    </div>
    <input class="content" type="text" name="contenuto" />
  </form>

  <div class="footer">
    <div>
      <img class="logo" src="../IMG/logo.png" alt="PChecker" />
      <span style="visibility: hidden; vertical-align: middle">l</span>
    </div>
    <div class="copyright">
      <img style="visibility: hidden" class="logo" src="../IMG/logo.png" alt="PChecker" />
      <span style="vertical-align: middle">PChecker&copy; 2020/2021</span>
    </div>
    <div></div>
  </div>
</body>

</html>