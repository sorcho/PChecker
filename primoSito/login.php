<?php

$username = $_POST['Username'];
$psw = $_POST['Password'];

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

$sql = "select username, password, admin from utente where username='$username' and password='$psw'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count == 1) {
    echo "Accesso riuscito, stampa dei dati: <br>";
    $sql = "select username, password, email, cellulare, sesso from utente where username='$username' and password='$psw'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count == 1){
        echo $row['username'] . "<br>";
        echo $row['email'] . "<br>";
        echo $row['cellulare'] . "<br>";
        echo $row['sesso'];

        if ($row['admin'] == 1)
            header("location: adminIndex.html");
    }
}else
    echo "Credenziali errate o utente non presente nel database.";