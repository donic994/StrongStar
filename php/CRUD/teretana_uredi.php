<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$naziv = $_POST["naziv"];
$adresa = $_POST["adresa"];
$telefon = $_POST["telefon"];
$rVrijeme = $_POST["rVrijeme"];

        
$upit = "UPDATE Teretana SET Naziv='$naziv', Adresa='$adresa', Telefon='$telefon', Radno_vrijeme='$rVrijeme' WHERE idTeretana='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: teretana.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();