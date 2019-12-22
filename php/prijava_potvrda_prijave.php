<?php
header('Content-type: text/plain; charset=utf-8');
include("baza.class.php");

$veza = new Baza ();
$veza->spojiDB();

             
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = ($_GET['email']); 
    $hash =($_GET['hash']);

    $search = "SELECT Email, Prijava_token FROM Korisnik WHERE Email='" . $email . "' AND Prijava_token='" . $hash . "' ";
    $match = $veza->selectDB($search);
    
    $kor = $veza->selectDB("SELECT idKorisnik FROM Korisnik WHERE Email='$email' ");
    $count4 = $kor->fetch_assoc();
    $korisničko_ime = $count4['idKorisnik'];

    if (mysqli_num_rows($match) > 0) {

        $veza->updateDB("UPDATE Korisnik SET Status_idStatus='1' WHERE Email='" . $email . "' AND Prijava_token='" . $hash . "' ") or die(mysql_error());
        header('Location: ../index.php');
        
        if ($count > 0) {
            setcookie('username', $korisničko_ime, time() + 60 * 60 * 24 * 30, "/");
            $veza->updateDB("UPDATE Korisnik SET Broj_prijave=0 WHERE Korisnicko_ime = '$korisničko_ime'");
            header('Location: ../index.html');
        }
        echo 'Uspješna prijava';
    } else {

        echo 'Link je nevažeći ili ste već aktivirali svoj račun.';
    }
} else {
  echo 'Molimo Vas da otvorite link koji ste primili u mailu.';
}