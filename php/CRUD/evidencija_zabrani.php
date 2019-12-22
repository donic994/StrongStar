<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$kID = $_POST["kID"];
$tID = $_POST["tID"];

$upit1 = "UPDATE Pristup SET Dozvoljen=0, Zabranjen=1 WHERE Korisnik_idKorisnik='$kID' AND Termin_idTermin='$tID';";

if ($veza->updateDB($upit1) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: evidencija.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();