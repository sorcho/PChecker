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
    <a class="active" href=""><i class="fa fa-tag" aria-hidden="true"></i> Prodotti</a>
    <a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contatti</a>
    <a style="position: absolute; right: 0" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrati</a>
  </div>

  <form id='form' action="carrello.php" method="post">
    <div id="container">
      <?php
      $query = "select * from componente";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);

      for ($i = 0; $i < $count; $i++) {
        echo "<div class='products products-table'>
              <div class='product'>
                <div class='product-img'>
                  <img src=" . $row['img_dir'] . " />
                </div>
                <div class='product-content'>
                  <h3 id='modello' value=" . $row['modello'] . " style='color: white'>" . $row['modello'] . "</h3>
                  <p class='product-text price'>" . $row['prezzo'] . ".00€</p>
                  <p class='product-text genre'>" . $row['tipologia'] . "</p>
                  <button type='submit' onclick='inviaForm()' id='invia'><i class='fa fa-cart-plus' aria-hidden='true'></i></button>
                </div>
              </div>
            </div>";

        $row = mysqli_fetch_assoc($result);
      }
      ?>
    </div>
  </form>
</body>

</html>