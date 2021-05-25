<?php
session_start();

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

$danaro = 0;
$fiscale = $_SESSION['fiscale'];

if (isset($_POST['IDP'])) {
  $id = $_POST['IDP'];
  $quant = 1;

  $query = "select * from carrello where ID_Prodotto='$id' and ID_Utente='$fiscale'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);

  if ($count == 1) {
    $quantDB = $row['quantità'];
    $quantDB += 1;
    $query = "UPDATE carrello SET quantità = '$quantDB' WHERE ID_Prodotto = '$id' and ID_Utente = '$fiscale'";
    mysqli_query($conn,$query);
  } else {
    $sql = "INSERT INTO carrello (ID_Utente ,ID_Prodotto, quantità) values (? ,?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $fiscale, $id, $quant);
    $stmt->execute();
  }
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
  <title>Cart</title>
</head>

<body>
  <div class="topnav">
    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Products</a>
    <a href="contatti.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact me</a>
    <?php
    if (isset($_SESSION['email'])) {
      if ($_SESSION['root'] == 0) {
        echo "<a style='float: right;' href='utente.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a class='active' style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
      } else {
        echo "<a style='float: right;' href='admin.php'><i class='fa fa-user' aria-hidden='true'></i> " .  $_SESSION['nome'] . "</a>
              <a class='active' style='float: right;' href='carrello.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart</a> ";
      }
    } else {
      echo "<a style='position: absolute; right: 0' href='register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Register</a>";
    }
    ?>
  </div>

  <table cellspacing="0" cellpadding="0">
    <tr>
      <th>Product</th>
      <th>Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th><button style="margin-left: 10px;" title="Aggiorna Carrello"><i class="fa fa-refresh" aria-hidden="true"></i></button></th>
    </tr>

    <?php
    $selectCart = "select * from carrello where ID_Utente = '$fiscale'";
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
              <td>" . $rowCart['quantità'] . "</td>
              <td><p>" . $rowProduct['prezzo'] . ".00€</p></td>
              <td><form action='rimuoviarticolo.php' method='post'><input style='width: 0;visibility: hidden;' type='text' name='id' value=" . $rowCart['ID'] . "><button title='Elimina Prodotto'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>
            </tr>";

      $rowCart = mysqli_fetch_assoc($resultCart);
    }
    ?>
  </table>
  <p style="color: white">Total: <?php echo $danaro; ?>.00€</p>

  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="mattiascotellaro@yahoo.com">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="2">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="shipping" value="0.00">
    <input type="hidden" name="amount" value="<?php echo $danaro; ?>">
    <input type="hidden" name="item_name" value="Pagamento al sito PChecker">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
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