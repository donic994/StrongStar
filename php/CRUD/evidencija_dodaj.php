<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$napredak = $_POST["napredak"];
$brDolazaka = $_POST["brDolazaka"];
$idKorisnik = $_POST["idKorisnik"];
$idTermin = $_POST["idTermin"];

        
$upit = "INSERT INTO Evidencija VALUES(default, '$brDolazaka', '$napredak', '$idKorisnik', '$idTermin');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: evidencija.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();