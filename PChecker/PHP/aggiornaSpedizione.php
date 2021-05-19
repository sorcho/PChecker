<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../CSS/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Aggiorna dati di Spedizione</title>
</head>

<body>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
        <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
        <?php
        if (isset($_SESSION['email'])) {
            echo "<a style='position: absolute; right: 96px;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Carrello</a>
            <a class='active' style='position: absolute; right: 0' href=''><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>";
        } else {
            echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Registrati</a>";
        }
        ?>
    </div>

    <form method="post" action="spedizioneDB.php">
        <div class="container">
            <h1>Aggiornamento dei dati di spedizione.</h1>
            <p>Per favore compila tutti i campi.</p>
            <hr>

            <label for="indirizzo"><b>Indirizzo</b></label>
            <input type="text" placeholder="Inserisci l'indirizzo" name="indirizzo" required>

            <label for="città"><b>Città</b></label>
            <input type="text" placeholder="Inserisci la città" name="città" required>

            <label for="provincia"><b>Provincia</b></label>
            <input type="text" placeholder="Inserisci la provincia" name="provincia" required>

            <label for="CAP"><b>CAP</b></label>
            <input type="number" placeholder="Inserisci il CAP" name="CAP" min="1" max="99999" required>
            <hr>

            <button type="submit" class="registerbtn">Aggiorna</button>
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