<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$email = $_SESSION['email'];
$fiscale = $_SESSION['fiscale'];
?>
<!DOCTYPE html>
<html lang="it">

<style>
  button {
    height: auto;
    width: auto;
    margin: 0;
    padding: 10px;
    background-color: #333333;
    color: white;
    border: 0;
  }

  button:hover {
    background-color: white;
    color: black;
    cursor: pointer;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/navbar.css">
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Pagina Utente</title>
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

  <div>
    <table cellspacing="0" cellpadding="0">
      <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Codice Fiscale</th>
        <th>Email</th>
        <th>Password</th>
      </tr>

      <?php
      $query = "select * from utente where email='$email'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);

      for ($i = 0; $i < $count; $i++) {
        echo "<tr>
              <td><p>" . $row['nome'] . "</p></td>
              <td><p>" . $row['cognome'] . "</p></td>
              <td><p>" . $row['codice_fiscale'] . "</p></td>
              <td><p>" . $row['email'] . "</p></td>
              <td><p>" . $row['password'] . "</p></td>
            </tr>";
      }
      ?>
    </table>
  </div>

  <div style="float: left;">
    <table cellspacing="0" cellpadding="0">
      <tr>
        <th>Indirizzo</th>
        <th>Città</th>
        <th>Provincia</th>
        <th>CAP</th>
      </tr>

      <?php
      $query = "select * from spedizione where ID_Utente='$fiscale'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);

      for ($i = 0; $i < $count; $i++) {
        echo "<tr>
              <td><p>" . $row['indirizzo'] . "</p></td>
              <td><p>" . $row['città'] . "</p></td>
              <td><p>" . $row['provincia'] . "</p></td>
              <td><p>" . $row['cap'] . "</p></td>
            </tr>";
      }
      ?>
    </table>
  </div>

  <div style="float: left; margin-top: 25px; margin-left: 29px;">
    <form action="aggiornaSpedizione.php">
      <?php
      if (!isset($row['indirizzo']) && !isset($row['città']) && !isset($row['provincia']) && !isset($row['cap'])) {
        echo "<button type='submit'><i class='fa fa-truck' aria-hidden='true'></i> Aggiorna dati di Spedizione</button>";
      }
      ?>
    </form>
  </div>

  <div style="float: left; margin-top: 25px; margin-left: 4px;">
    <form action="logout.php">
      <button type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</button>
    </form>
  </div>

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