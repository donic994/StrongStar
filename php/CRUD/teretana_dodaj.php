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

        
$upit = "INSERT INTO Teretana VALUES(default, '$naziv', '$adresa', '$telefon', '$rVrijeme');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: teretana.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();