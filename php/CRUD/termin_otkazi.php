<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$sID = $_POST["sID"];
$nID = $_POST["nID"];

$upit1 = "UPDATE Termin SET Status='0' WHERE idTermin='$sID';";
$upit2 = "UPDATE Polaznost SET Termin='$nID' WHERE Termin='$sID';";
$upit3 = $veza->selectDB("SELECT k.Email FROM Korisnik k, Polaznost po, Termin t WHERE k.idKorisnik = po.Korisnik_idKorisnik AND t.idTermin = po.Termin AND t.idTermin = '$nID'");


if ($veza->updateDB($upit1) === TRUE && $veza->updateDB($upit2)===TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: termin.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();