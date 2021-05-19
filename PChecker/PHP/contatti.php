<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<style>
  .ogg,
  input[type="email"] {
    width: 95%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #252525;
    text-align: center;
    color: white;
  }

  textarea {
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

  button {
    height: auto;
    width: auto;
    margin: 0;
    padding: 10px;
    font-weight: normal;
    font-size: 12pt;
    background-color: #333333;
    border: 1px solid white;
  }

  button:hover {
    background-color: #282b33;
    color: white;
    cursor: pointer;
  }

  p {
    width: 100%;
    color: white;
    margin-left: 25px;
    margin-top: 10px;
    font-size: 19px;
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
    <?php
    if (isset($_SESSION['email'])) {
      echo "<a style='position: absolute; right: 96px;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Carrello</a>
            <a style='position: absolute; right: 0' href='utente.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>";
    } else {
      echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Registrati</a>";
    }
    ?>
  </div>

  <form method="post" action="sendMail.php">
    <div style="width: 50%; float: left;">
      <?php
      if (isset($_SESSION['email'])) {
        echo "<input type='email' readonly name='email' value=" . $_SESSION['email'] . ">";
      } else {
        echo "<input type='email' name='email' placeholder='Email'/>";
      }
      ?>
      <input class="ogg" type="text" name="oggetto" placeholder="Oggetto dell'email" />
    </div>
    <div style="float: left; width: 48.5%;">
      <p>Benvenuto nell'assistenza tecnica! In questa pagina potrai mandare un ticket di assistenza a me, il founder! <br>
        Nel caso tu avessi già effettuato l'accesso, la mail sarà già inserita e non avrai modo di cambiarla, al contrario, la mail dovrai inserirla manualmente, quindi scrivila correttamente altrimenti non riceverai alcuna risposta.</p>
    </div>
    <textarea name="contenuto" cols="30" rows="10" placeholder="Messaggio"></textarea>
    <center><button type="submit" value="Invia ticket"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button></center>
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