<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$dozvoljen = $_POST["dozvoljen"];
$zabranjen = $_POST["zabranjen"];
$idTermin = $_POST["idTermin"];
$idKorisnik = $_POST["idKorisnik"];
        
$upit = "UPDATE Pristup SET Dozvoljen= '$dozvoljen',Zabranjen='$zabranjen', Termin_idTermin='$idTermin', Korisnik_idKorisnik='$idKorisnik' WHERE idPristup='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: pristup.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();