<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$naziv = $_POST["naziv"];
$vrsta=$_POST["vrsta"];
$tip = $_POST["tip"];
$opis = $_POST["opis"];
$idKorisnik = $_POST["idKorisnik"];
        
$upit = "INSERT INTO Program VALUES(default, '$naziv','$vrsta', '$tip', '$opis', '$idKorisnik');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: program.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();