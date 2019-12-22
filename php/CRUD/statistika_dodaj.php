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
        
$upit = "INSERT INTO Statistika VALUES(default, '$bodovi','$datum', '$idTermin', '$idKorisnik');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: statistika.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();