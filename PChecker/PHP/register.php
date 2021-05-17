<?php
session_start();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione</title>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/forms.css">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
        <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
        <a class="active" style="position: absolute; right: 0" href=""><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
    </div>

    <form method="post" action="registerDB.php">
        <div class="container">
            <h1>Registrazione</h1>
            <p>Per favore compila tutti i campi.</p>
            <hr>

            <label for="nome"><b>Nome</b></label>
            <input type="text" placeholder="Inserisci nome" name="nome" required>

            <label for="cognome"><b>Cognome</b></label>
            <input type="text" placeholder="Inserisci cognome" name="cognome" required>

            <label for="fiscale"><b>Codice Fiscale</b></label>
            <input type="text" placeholder="Inserisci codice fiscale" name="fiscale" minlength="16" maxlength="16" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Inserisci Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="psw" required>
            <hr>

            <button type="submit" class="registerbtn">Registrati</button>
        </div>

        <div class="container signin">
            <p>Già registrato? <a href="login.php" style="color: #8f35e3;text-decoration: none;">Accedi</a>!</p>
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