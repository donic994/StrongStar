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

        
$upit = "INSERT INTO Termin VALUES(default, '$naziv', '$vrp', '$vrz', '$lokacija', '$dvorana', '$brPolaznika', '$program', '$status');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: termin.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();
