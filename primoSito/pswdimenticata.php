<?php

$email = $_POST['Email'];

function check($link, $sql)
{
    if (mysqli_query($link, $sql))
        echo "Query successfully executed.<br>";
    else
        echo "Error during query execution: " . mysqli_error($link);
}

$link = mysqli_connect('localhost','root','');
if (!$link)
    die('could not connect: ' . mysqli_error($link));

$db = mysqli_select_db($link, 'login');

$sql = "select email,password from utente where email='$email'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "Password inviata alla mail dell'account!";
    $msg = "Ecco la password: " . $row['password'];
    mail($email, "Recupero Password", $msg);
}else{
    echo "Mail non trovata nel database, reinserirla.";
}