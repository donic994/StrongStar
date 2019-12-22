<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$bodovi = $_POST["bodovi"];
$datum=$_POST["datum"];
$idTermin = $_POST["idTermin"];
$idKorisnik = $_POST["idKorisnik"];
        
$upit = "UPDATE Statistika SET Bodovi='$bodovi', Datum='$datum', idTermin='$idTermin', Korisnik_idKorisnik='$idKorisnik' WHERE idStatistika='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: statistika.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();