<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
        
$upit = "DELETE FROM Teretana WHERE idTeretana='$ID';";

if ($veza->selectDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: teretana.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();