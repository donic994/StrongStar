<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

if (isset($_GET['data'])) {
    $data = $_GET['data'];
    $err_podudaranje = "";

    $ispravno = true;
    $upit = "SELECT * FROM Korisnik WHERE Korisnicko_ime='$data'";
    $rez = $veza->selectDB($upit);
    if (mysqli_num_rows($rez) > 0) {
        $err_podudaranje = "Korisničko ime već postoji";
        $ispravno = false;
    }
    if (!$ispravno) {
        echo $err_podudaranje;
        $veza->zatvoriDB();
    } else {
        $err_podudaranje = "Korsničko ime je slobodno";
        echo $err_podudaranje;
    }
}
