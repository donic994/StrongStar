<?php
error_reporting(0);

//Provjera nedozvoljenih znakova
$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$korisnicko_ime = $_POST["korisnicko_ime"];
$email = $_POST["email"];
$lozinka = $_POST["lozinka"];
$potvrda_lozinke = $_POST["potvrda_lozinke"];

if (preg_match("%[(){}'!#“\\\/]%", $ime))
    echo nl2br("Nedozvoljeni znak u imenu");
if (preg_match("%[(){}'!#“\\\/]%", $prezime))
    echo nl2br("Nedozvoljeni znak u prezimenu");
if (preg_match("%[(){}'!#“\\\/]%", $korisnicko_ime))
    echo nl2br("Nedozvoljeni znak u korisnickom imenu");
if (preg_match("%[(){}'!#“\\\/]%", $lozinka))
    echo nl2br("Nedozvoljeni znak u lozinci");
if (preg_match("%[(){}'!#“\\\/]%", $potvrda_lozinke))
    echo nl2br("Nedozvoljeni znak u potvrdi lozinke");

//Provjera dal je barem jedna kategorija odabrana i da polja nisu prazna
if (empty($_POST["ime"]))
    echo nl2br(" Prazno ime \n");
if (empty($_POST["prezime"]))
    echo nl2br(" Prazno prezime\n");
if (empty($_POST["korisnicko_ime"]))
    echo nl2br(" Prazno korisnicko ime \n");
if (empty($_POST["lozinka"]))
    echo nl2br(" Prazna lozinka \n");
if (empty($_POST["potvrda_lozinke"]))
    echo nl2br(" Prazna potvrda lozinke \n");

//Provjera lozinke
if (!preg_match("%^(?=(?:.*[A-Z]){2})(?=(?:.*[a-z]){2})(?=(?:.*[0-9]){1})\S+$%", $lozinka))
    echo nl2br( "Lozinka mora sadrzavati 2 velika slova, 2 mala, broj i izmedju 5-15 znakova. \n");

//Provjera potvrde lozinke
if($lozinka != $potvrda_lozinke) echo nl2br("Lozinke se ne podudaraju \n");

//Provjera e-maila
if (!preg_match("%^\w+@\w+\.\w+$%", $email))
    echo nl2br( "E-mail mora biti unesen kao nesto@nesto.nesto . \n");

?>