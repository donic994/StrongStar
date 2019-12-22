<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$vrijemeP = $_POST["vrijemeP"];
$korisnik = $_POST["korisnik"];
$upiti = $_POST["upiti"];


$upit = "UPDATE Dnevnik_rada SET Vrijeme_prijave='$vrijemeP',  Korisnik_idKorisnik='$korisnik', Upiti='$upiti' WHERE idDnevnik_rada='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: dnevnik_rada.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();