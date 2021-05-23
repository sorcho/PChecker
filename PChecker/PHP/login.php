<?php
session_start();
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log-in</title>
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/forms.css">
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="topnav">
    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a class="active" style="position: absolute; right: 0" href=""><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
  </div>

  <form method="post" action="loginDB.php">
    <div class="container">
      <h1>Log-in</h1>
      <p>Fill every field in please.</p>
      <hr>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Insert your Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Insert your Password" name="psw" required>
      <hr>

      <button type="submit" class="registerbtn">Log-in</button>
    </div>

    <div class="container signin">
      <p>Nuovo utente? <a href="register.php" style="color: #8f35e3;text-decoration: none;">Registrati</a>!</p>
    </div>
  </form>

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