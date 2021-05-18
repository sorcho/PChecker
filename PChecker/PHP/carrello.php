<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$danaro = 0;

if (isset($_POST['IDP'])) {
  $id = $_POST['IDP'];
  $quant = 1;

  $sql = "INSERT INTO carrello (ID_Prodotto, quantità) values (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $id, $quant);
  $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/navbar.css" />
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="../JS/script.js"></script>
  <title>Carrello</title>
</head>

<body>
  <div class="topnav">
    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <?php
    if ($_SESSION['email'] != null) {
      echo "<a class='active' style='position: absolute; right: 96px;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Carrello</a>
            <a style='position: absolute; right: 0' href='../HTML/utente.html'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>";
    } else {
      echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Registrati</a>";
    }
    ?>
  </div>

  <table cellspacing="0" cellpadding="0">
    <tr>
      <th>Prodotto</th>
      <th>Nome</th>
      <th>Quantità</th>
      <th>Prezzo</th>
      <th><button style="margin-left: 10px;" title="Aggiorna Carrello"><i class="fa fa-refresh" aria-hidden="true"></i></button></th>
    </tr>

    <?php
    $selectCart = "select * from carrello";
    $resultCart = mysqli_query($conn, $selectCart);
    $rowCart = mysqli_fetch_assoc($resultCart);
    $countCar = mysqli_num_rows($resultCart);

    for ($i = 0; $i < $countCar; $i++) {
      $idp = $rowCart['ID_Prodotto'];

      $selectProduct = "select * from prodotti where ID = '$idp'";
      $resultProduct = mysqli_query($conn, $selectProduct);
      $rowProduct = mysqli_fetch_assoc($resultProduct);

      $danaro += $rowProduct['prezzo'] * $rowCart['quantità'];

      echo "<tr>
              <td><img class='img' src=" . $rowProduct['img_dir'] . "></td>
              <td>" . $rowProduct['modello'] . "</td>
              <td><input type='number' value=" . $rowCart['quantità'] . " min='1' max='5' style='width: 25px' /></td>
              <td><p>" . $rowProduct['prezzo'] . ".00€</p></td>
              <td><form action='rimuoviarticolo.php' method='post'><input style='width: 0;visibility: hidden;' type='text' name='id' value=" . $rowCart['ID'] . "><button title='Elimina Prodotto'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>
            </tr>";

      $rowCart = mysqli_fetch_assoc($resultCart);
      $rowProduct = mysqli_fetch_assoc($resultProduct);

      header("Location prodotti.php");
    }
    ?>
  </table>
  <p style="color: white">Totale: <?php echo $danaro; ?>.00€</p>

  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="mattiascotellaro@yahoo.com">
    <input type="hidden" name="lc" value="IT">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="2">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="shipping" value="0.00">
    <input type="hidden" name="amount" value="<?php echo $danaro; ?>">
    <input type="hidden" name="item_name" value="Pagamento al sito PChecker">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
    <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
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