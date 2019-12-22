<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$korisnik = $_POST["korisnik"];
$idTermin = $_POST["idTermin"];
$idKorisnik = $_POST["idKorisnik"];
        
$upit = "UPDATE Polaznost SET Korisnik= '$korisnik', Termin='$idTermin', Korisnik_idKorisnik='$idKorisnik' WHERE idPolaznost='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: polaznost.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();