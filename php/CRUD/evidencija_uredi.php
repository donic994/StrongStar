<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$sID = $_POST["sID"];
$napredak = $_POST["napredak"];
$brDolazaka = $_POST["brDolazaka"];
$idKorisnik = $_POST["idKorisnik"];
$idTermin = $_POST["idTermin"];

        
$upit = "UPDATE Evidencija SET Broj_dolazaka='$brDolazaka', Napredak='$napredak', Korisnik_idKorisnik='$idKorisnik', Termin_idTermin='$idTermin' WHERE idEvidencija='$sID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: evidencija.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();