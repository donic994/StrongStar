<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$SkoID = $_POST["SkoID"];
$SkuID = $_POST["SkuID"];
$koID = $_POST["koID"];
$kuID = $_POST["kuID"];

        
$upit = "UPDATE Korisnik_has_Kupon SET Korisnik_idKorisnik='$koID', Kupon_idKupon='$kuID' WHERE Korisnik_idKorisnik='$SkoID' AND Kupon_idKupon='$SkuID';";
if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: korisnik_kupon.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();