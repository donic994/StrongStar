<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];

        
$upit = "DELETE FROM Košarica WHERE idKošarica='$ID';";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: kosarica.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();

}
$veza->zatvoriDB();