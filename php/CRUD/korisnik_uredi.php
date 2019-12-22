<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$email = $_POST["email"];
$username= $_POST["username"];
$tipKorisnika=$_POST["tipKorisnika"];
$brBodova=$_POST["brBodova"];
$status=$_POST["status"];
$lozinka=$_POST["lozinka"];
$kriptirana= md5($lozinka);

        
$upit = "UPDATE Korisnik SET Ime='$ime', Prezime='$prezime', Email='$email', Korisnicko_ime='$username', Tip_korisnika='$tipKorisnika', Broj_bodova='$brBodova', Status_idStatus='$status', Lozinka='$lozinka', Kriptirana_lozinka='$kriptirana'  WHERE idKorisnik='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: korisnik.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();