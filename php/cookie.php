<?php

header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();


$korisničko_ime = $_POST["korisničko_ime"];
$lozinka = $_POST["lozinka"];

session_start();
if (isset($_SESSION['korisnik'])) {
    header("Location: ../index.php");
}

$count = mysqli_num_rows($veza->selectDB("SELECT * FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka'"));
$IDstatus = $veza->selectDB("SELECT Status_idStatus FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime'");
$BRprijava = $veza->selectDB("SELECT Broj_prijave FROM  Korisnik WHERE Korisnicko_ime = '$korisničko_ime'");

$count1= $IDstatus->fetch_assoc();               
$status = $count1['Status_idStatus'];

$count2 = $BRprijava->fetch_assoc();               
$prijava = $count2['Broj_prijave'];

$brNE=$veza->selectDB("SELECT Broj_neuspjesnih_prijava FROM Konfiguracija_sustava");
$count3 = $brNE->fetch_assoc();               
$nePrijave = $count3['Broj_neuspjesnih_prijava'];

$kor=$veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Korisnicko_ime='$korisničko_ime' ");
$count4 = $kor->fetch_assoc();               
$korisnik = $count4['idKorisnik'];

$tip1=$veza->selectDB("SELECT Tip_korisnika FROM Korisnik WHERE Korisnicko_ime='$korisničko_ime' ");
$count5 = $tip1->fetch_assoc();               
$tip = $count5['Tip_korisnika'];

echo $korisnik.'+++++'.$veza->vvrijeme();

if($prijava>=3){ 
    $nePrijava=$veza->updateDB("UPDATE Korisnik SET Status_idStatus='3', Broj_prijave='0' WHERE Korisnicko_ime = '$korisničko_ime'");
    $veza->unos_baza_dnevnik($fupit, $nePrijava);
}

if ($count > 0 && $status == 1 && $prijava <$nePrijave) {
    
    $_SESSION['korisnik'] = $korisničko_ime;
    $_SESSION['tip'] = $tip;
    
    setcookie('username', $_POST['korisničko_ime'], time() + 60 * 60 * 24 * 30, "/");
    $fupit="UPDATE Korisnik SET Broj_prijave=0 WHERE Korisnicko_ime ='$korisničko_ime' and Lozinka = '$lozinka'";
    $veza->updateDB("UPDATE Korisnik SET Broj_prijave=0, Broj_bodova=Broj_bodova+5 WHERE Korisnicko_ime = '$korisničko_ime' and Lozinka = '$lozinka'");
    $veza->unos_baza_dnevnik($fupit, $korisnik);
    header('Location: ../index.php');
} else {
    echo 'Username/Password Invalid';
    $veza->updateDB("UPDATE Korisnik SET Broj_prijave=Broj_prijave+1 WHERE Korisnicko_ime = '$korisničko_ime'");
    header('Location: ../prijava.php');
}


echo $_SESSION['korisnik'];
echo $_SESSION['tip'];
?>