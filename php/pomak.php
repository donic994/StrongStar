<?php
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

$json_file = file_get_contents('http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json');
$jfo = json_decode($json_file, true);
$pomak = $jfo['WebDiP']['vrijeme']['pomak']['brojSati'];
echo $pomak;
$trenutno_vrijeme = date("Y-m-d H:i:s");

echo $trenutno_vrijeme;

$vvrijeme=$veza->vvrijeme();

$sqlupit = "UPDATE Virtualno_vrijeme set Pomak=$pomak, Trenutno='".$trenutno_vrijeme."', Pomaknuto_vrijeme='".$vvrijeme."' WHERE idVirtualno_vrijeme=1;";
$veza->updateDB($sqlupit);

echo $sqlupit;
//header("Location: ../index.php");
?>