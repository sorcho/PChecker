<?php
session_start();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/forms.css">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Products</a>
        <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact me</a>
        <a class="active" style="position: absolute; right: 0" href=""><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
    </div>

    <form method="post" action="registerDB.php">
        <div class="container">
            <h1>Registration</h1>
            <p>Fill every field in please.</p>
            <hr>

            <label for="nome"><b>Name</b></label>
            <input type="text" placeholder="Insert name" name="nome" required>

            <label for="cognome"><b>Surname</b></label>
            <input type="text" placeholder="Insert surname" name="cognome" required>

            <label for="fiscale"><b>Tax Code</b></label>
            <input type="text" placeholder="Insert your Tax Code" name="fiscale" minlength="16" maxlength="16" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Insert your Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Insert a Password" name="psw" required>
            <hr>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already registered? <a href="login.php" style="color: #8f35e3;text-decoration: none;">Log-in</a>!</p>
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