<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "pchecker");
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/navbar.css" />
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="../CSS/prodotti.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="../JS/script.js"></script>
  <title>Prodotti</title>
</head>

<body>
  <div class="topnav">
    <a href="../PHP/index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a class="active" href="prodotti.php"><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a style="position: absolute; right: 0" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
  </div>

    <?php
    $query = "select * from prodotti";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    for ($i = 0; $i < $count; $i++) {
      echo "<form action='carrello.php' method='post'>
              <div class='products products-table'>
                <div class='product'>
                  <div class='product-img'>
                    <img src=" . $row['img_dir'] . " />
                  </div>
                  <div class='product-content'>
                    <h3 style='color: white'>" . $row['modello'] . "</h3>
                    <p class='product-text price'>" . $row['prezzo'] . ".00€</p>
                    <p class='product-text genre'>" . $row['tipologia'] . "</p>
                    <button type='submit'><i class='fa fa-cart-plus' aria-hidden='true'></i></button>
                    <input style='visibility: hidden;' value=" . $row['ID'] . " type='text' name='IDP'>
                  </div>
                </div>
              </div>
            </form>";

      $row = mysqli_fetch_assoc($result);
    }
    ?>

</body>

</html>