<?php
session_start();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
        <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
        <a class="active" style="position: absolute; right: 0" href=""><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
    </div>

    <form method="post" action="">
        <div class="container">
            <h1>Login</h1>
            <p>Per favore compila tutti i campi.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Inserisci Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="psw" required>
            <hr>

            <button type="submit" class="registerbtn">Accedi</button>
        </div>

        <div class="container signin">
            <p>Nuovo utente? <a href="register.php" style="color: #8f35e3;text-decoration: none;">Registrati</a>!</p>
        </div>
    </form>
</body>

</html>