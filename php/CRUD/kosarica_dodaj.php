<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$kupon = $_POST["kupon"];
$statistika = $_POST["statistika"];
$vrijeme = $_POST["vrijeme"];
$kolicina = $_POST["kolicina"];
$cijena = $_POST["cijena"];
$kod = md5( rand(0,1000) );

$upit = "INSERT INTO Košarica VALUES(default, '$kupon', '$statistika', '$vrijeme', '$kolicina', '$cijena', '$kod');";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: kosarica.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();