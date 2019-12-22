<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$naziv = $_POST["naziv"];
$vrp=$_POST["vrp"];
$vrz = $_POST["vrz"];
$lokacija = $_POST["lokacija"];
$dvorana = $_POST["dvorana"];
$brPolaznika = $_POST["brPolaznika"];
$program = $_POST["program"];
$status = $_POST["status"];

        
$upit = "UPDATE Termin SET Naziv='$naziv', Vrijeme_početka='$vrp', Vrijeme_završetka='$vrz', Lokacija='$lokacija', Dvorana='$dvorana', Broj_polaznika='$brPolaznika', Program='$program', Status='$status' WHERE idTermin='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: termin.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();