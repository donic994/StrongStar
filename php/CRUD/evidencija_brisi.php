<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
        
$upit = "DELETE FROM Evidencija WHERE idEvidencija='$ID';";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: evidencija.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
    header('Location: evidencija.php');
}
$veza->zatvoriDB();