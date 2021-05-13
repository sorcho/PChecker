<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "pchecker");

$danaro = 0;
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
    <a class="active" href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="#news"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a style="position: absolute; right: 0" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
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
    $query = "select * from carrello";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    for ($i = 0; $i < $count; $i++) {
      $danaro += $row['prezzo'] * $row['quantità'];

      echo "<tr>
              <td><img class='img' src=" . $row['img_dir'] . "></td>
              <td>" . $row['modello'] . "</td>
              <td><input type='number' value=" . $row['quantità'] . " min='1' max='5' style='width: 25px' /></td>
              <td><p>" . $row['prezzo'] . ".00€</p></td>
              <td><form action='rimuoviarticolo.php' method='post'><input style='width: 0;visibility: hidden;' type='text' name='id' value=" . $row['ID'] . "><button title='Elimina Prodotto'><i class='fa fa-trash' aria-hidden='true'></i></button></form></td>
            </tr>";

      $row = mysqli_fetch_assoc($result);
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

</body>

</html>