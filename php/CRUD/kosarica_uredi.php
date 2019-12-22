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

$upit = "UPDATE Košarica SET idKupon='$kupon', idStatistika='$statistika', Vrijeme_kupovine='$vrijeme', Količina='$kolicina', Cijena='$cijena', Generiran_kod='$kod' WHERE idKošarica='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: kosarica.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();