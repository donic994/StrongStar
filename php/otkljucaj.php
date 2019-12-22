<?php

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$username= $_POST["username"];
$username1= $_COOKIE['username'];
            $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username1'");
            
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
       
$upit = "UPDATE Korisnik SET Status_idStatus='1'  WHERE Korisnicko_ime='$username';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    $veza->unos_baza_dnevnik($upit, $korisnikID);
    header('Location: otkljucavanje_blokiranje.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();