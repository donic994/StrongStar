<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();


$stajanje = $_POST["trajanje"];
$brNE = $_POST["brNE"];
$brDA = $_POST["brDA"];
$pomakVremena = $_POST["pomakVremena"];
$stranicenje = $_POST["stranicenje"];
$korisnik = $_POST["korisnik"];
$tip = $_POST["tip"];
$status = $_POST["status"];

$upit = "UPDATE Konfiguracija_sustava SET Trajanje_sesije='$trajanje', Broj_neuspjesnih_prijava='$brNE', Broj_prijava_ukupno='$brDA', Pomak_vremena='$pomakVremena', Stranicenje='$stranicenje', Korisnik_idKorisnik='$korisnik', Korisnik_Tip_korisnika='$tip', Korisnik_Status_idStatus='$status';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: konfiguracija.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();