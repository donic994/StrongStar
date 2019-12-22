<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$naziv = $_POST["naziv"];
$sID=$_POST["sID"];
        
$upit = "UPDATE Tip_korisnika SET Naziv='$naziv' WHERE idTip_korisnika='$sID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
        header('Location: tip_korisnika.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();