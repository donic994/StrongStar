<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$koID = $_POST["koID"];
$kuID = $_POST["kuID"];
        
$upit = "DELETE FROM Korisnik_has_Kupon WHERE Korisnik_idKorisnik='$koID' AND Kupon_idKupon='$kuID' ;";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: korisnik_kupon.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();