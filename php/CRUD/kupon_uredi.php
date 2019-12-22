<?php

header('Content-type: text/plain; charset=utf-8');
include("../baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$ID = $_POST["ID"];
$naziv = $_POST["naziv"];
$popust = $_POST["popust"];
$pdf = $_POST["pdf"];
$video = $_POST["video"];
$potrebniB = $_POST["potrebniB"];
$vrod = $_POST["vrod"];
$vrdo = $_POST["vrdo"];
$cijena = $_POST["cijena"];
$idTermin = $_POST["idTermin"];
        
$upit = "UPDATE Kupon SET Naziv='$naziv', Popust='$popust', PDF='$pdf', Video='$video', Potrebni_bodovi='$potrebniB', Vrijedi_od='$vrod', Vrijedi_do='$vrdo', Cijena='$cijena', Termin_idTermin='$idTermin' WHERE idkupon='$ID';";

if ($veza->updateDB($upit) === TRUE) {
    echo "Uspješno spremljeni podaci";
    header('Location: kupon.php');
} else {
    echo "Error: " . $upit . "<br>" . $veza->pogreskaDB();
}
$veza->zatvoriDB();