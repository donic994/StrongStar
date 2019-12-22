<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

setcookie('username', '', time() - 60 * 60 * 24 * 30, "/");
setcookie('PHPSESSID', '', time() - 60 * 60 * 24 * 30, "/");

$odjava='Odjava korisnika';
$username= $_COOKIE['username'];
            $korisnik=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$username'");
            
            $count4= $korisnik->fetch_assoc();               
            $korisnikID = $count4['idKorisnik'];
$veza->unos_baza_dnevnik($odjava, $korisnikID);
header('Location: ../index.php');