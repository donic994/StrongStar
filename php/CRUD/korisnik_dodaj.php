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

        
$upit = "INSERT INTO Korisnik(Ime, Prezime, Email, Korisnicko_ime, Tip_korisnika, Broj_bodova, Status_idStatus, Lozinka, Kriptirana_lozinka) VALUES('$ime', '$prezime','$email', '$username', '$tipKorisnika', '$brBodova', '$status', '$lozinka', '$kriptirana');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: korisnik.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();