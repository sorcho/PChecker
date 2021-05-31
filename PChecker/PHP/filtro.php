<?php
session_start();

$conn = mysqli_connect("localhost", "mattiascotellaro", "", "my_mattiascotellaro");

function is_decimal($val)
{
    return is_numeric($val) && floor($val) != $val;
}

$tipo = $_GET['tipologia'];

if ($tipo == "blank") {
    $btn = "";

    $query = "select * from prodotti";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if (isset($_SESSION['email'])) {
        $btn = "<button type='submit'><i class='fa fa-cart-plus' aria-hidden='true'></i></button>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $decimal = "<p class='product-text price'>" . $row['prezzo'] . ".00€</p>";

        if (is_decimal($row['prezzo'])) {
            $decimal = "<p class='product-text price'>" . $row['prezzo'] . "€</p>";
        }

        echo "<form action='carrello.php' method='post'>
                <div class='products products-table'>
                  <div class='product'>
                    <div class='product-img'>
                      <img src=" . $row['img_dir'] . " />
                    </div>
                    <div class='product-content'>
                      <h3 style='color: white'>" . $row['modello'] . "</h3>" .
            $decimal
            . "<p class='product-text genre'>" . $row['tipologia'] . "</p>" .
            $btn
            . "<input style='visibility: hidden;' value=" . $row['ID'] . " type='text' name='IDP'>
                    </div>
                  </div>
                </div>
              </form>";
    }
} else {
    $btn = "";

    $query = "select * from prodotti where tipologia = '$tipo'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if (isset($_SESSION['email'])) {
        $btn = "<button type='submit'><i class='fa fa-cart-plus' aria-hidden='true'></i></button>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $decimal = "<p class='product-text price'>" . $row['prezzo'] . ".00€</p>";

        if (is_decimal($row['prezzo'])) {
            $decimal = "<p class='product-text price'>" . $row['prezzo'] . "€</p>";
        }

        echo "<form action='carrello.php' method='post'>
              <div class='products products-table'>
                <div class='product'>
                  <div class='product-img'>
                    <img src=" . $row['img_dir'] . " />
                  </div>
                  <div class='product-content'>
                    <h3 style='color: white'>" . $row['modello'] . "</h3>" .
                    $decimal
                    . "<p class='product-text genre'>" . $row['tipologia'] . "</p>" .
                    $btn
                    . "<input style='visibility: hidden;' value=" . $row['ID'] . " type='text' name='IDP'>
                  </div>
                </div>
              </div>
            </form>";
    }
}
