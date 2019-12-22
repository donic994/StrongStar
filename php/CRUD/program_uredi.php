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
        
$upit = "UPDATE Program SET Naziv= '$naziv',Vrsta='$vrsta', Tip='$tip', Opis='$opis', Korisnik_idKorisnik='$idKorisnik' WHERE idProgram='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: program.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();