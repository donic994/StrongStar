<?php

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$username= $_POST["username"];
       
$upit = "UPDATE Korisnik SET Tip_korisnika='2'  WHERE Korisnicko_ime='$username';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: kreiraj_moderatora.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();